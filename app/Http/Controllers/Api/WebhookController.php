<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('Webhook received'); // Tambahkan log ini

        $data = $request->all();

        // Log the webhook data for debugging purposes
        Log::info('Midtrans Webhook:', $data);

        // Validate the signature key
        $signatureKey = hash('sha512', $data['order_id'] . $data['status_code'] . $data['gross_amount'] . env('MIDTRANS_SERVER_KEY'));
        if ($signatureKey !== $data['signature_key']) {
            return response()->json(['message' => 'Invalid signature key'], 400);
        }

        // Find the order by order_id
        $order = Payment::where('id', $data['order_id'])->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Handle the transaction status
        switch ($data['transaction_status']) {
            case 'settlement':
                $order->status = 'paid';
                break;
            case 'pending':
                $order->status = 'pending';
                break;
            case 'deny':
            case 'expire':
            case 'cancel':
                $order->status = 'failed';
                break;
            default:
                $order->status = 'pending';
                break;
        }

        // Save the order status
        $order->save();

        return response()->json(['message' => 'Webhook received successfully']);
    }
}

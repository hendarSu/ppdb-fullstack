<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PaymentGatewaySetting;

class PaymentGatewaySettings extends Component
{
    public $merchantId = 'G998052544';
    public $clientKey = 'SB-Mid-client-xLguKp9CGB19g94K';
    public $serverKey = 'SB-Mid-server-V2bPeHF2VnRdxS-bJO1AzQt3';
    public $provider = 'midtrans';
    public $isEnabled = true;
    public $settings = [];

    public function mount()
    {
        $this->loadSettings();
    }

    public function render()
    {
        return view('livewire.payment-gateway-settings')->layout('components.layouts.app', ['title' => "Setting Payment Gateway", 'isPortal' => true]);
    }

    public function loadSettings()
    {
        $setting = PaymentGatewaySetting::first();
        if ($setting) {
            $this->merchantId = $setting->merchant_id;
            $this->clientKey = $setting->client_key;
            $this->serverKey = $setting->server_key;
            $this->provider = $setting->provider;
            $this->isEnabled = $setting->is_enabled;
        }
    }

    public function saveSettings()
    {
        try {
            PaymentGatewaySetting::updateOrCreate(
                ['id' => 1],
                [
                    'merchant_id' => $this->merchantId,
                    'client_key' => $this->clientKey,
                    'server_key' => $this->serverKey,
                    'provider' => $this->provider,
                    'is_enabled' => $this->isEnabled,
                ]
            );
            session()->flash('message', 'Settings saved successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save settings: ' . $e->getMessage());
        }
    }

    public function updateSettings()
    {
        $this->saveSettings();
    }

    public function deleteSettings()
    {
        PaymentGatewaySetting::truncate();
        $this->reset(['merchantId', 'clientKey', 'serverKey', 'provider', 'isEnabled']);
    }
}


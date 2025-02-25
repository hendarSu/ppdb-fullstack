<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->string('method');
            $table->string('status')->default('pending');
            $table->decimal('amount', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

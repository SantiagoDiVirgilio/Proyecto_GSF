<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['pending', 'approved', 'failed'])->default('pending');
            $table->decimal('transaction_amount', 10, 2)->required();
            $table->string('payment_id', 100)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void829268

    {
        Schema::dropIfExists('pagos');
    }
};

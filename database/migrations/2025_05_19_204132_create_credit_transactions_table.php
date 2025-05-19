<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('credit_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('amount'); // +10, -1, etc.
            $table->string('type'); // 'use', 'purchase', 'subscription', 'promo', etc.
            $table->string('reference')->nullable(); // id de pago Stripe, o similar
            $table->timestamp('expires_at')->nullable(); // por si haces créditos temporales/promos
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_transactions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_delivery_day', function (Blueprint $table) {
            $table->foreignId('subscription_id')->constrained()->onDelete('cascade');
            $table->foreignId('delivery_day_id')->constrained()->onDelete('cascade');
            $table->primary(['subscription_id', 'delivery_day_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_delivery_day');
    }
};

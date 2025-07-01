<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_meal_type', function (Blueprint $table) {
            $table->foreignId('subscription_id')->constrained()->onDelete('cascade');
            $table->foreignId('meal_type_id')->constrained()->onDelete('cascade');
            $table->primary(['subscription_id', 'meal_type_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_meal_type');
    }
};

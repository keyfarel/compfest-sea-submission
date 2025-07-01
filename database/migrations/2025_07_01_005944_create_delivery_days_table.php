<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_days', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->tinyInteger('day_of_week')->comment('1 for Monday, 7 for Sunday');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_days');
    }
};

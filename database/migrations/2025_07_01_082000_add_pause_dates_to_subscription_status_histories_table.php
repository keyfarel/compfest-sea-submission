<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::table('subscription_status_histories', function (Blueprint $table) {
            $table->date('pause_start_date')->nullable()->after('notes');
            $table->date('pause_end_date')->nullable()->after('pause_start_date');
        });
    }
    public function down(): void {
        Schema::table('subscription_status_histories', function (Blueprint $table) {
            $table->dropColumn(['pause_start_date', 'pause_end_date']);
        });
    }
};

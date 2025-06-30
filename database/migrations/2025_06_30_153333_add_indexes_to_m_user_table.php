<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->index('name');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            // Hapus index jika migration di-rollback
            $table->dropIndex(['name']);
            $table->dropIndex(['role_id']);
        });
    }
};

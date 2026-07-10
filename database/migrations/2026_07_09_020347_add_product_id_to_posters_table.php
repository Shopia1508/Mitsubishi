<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posters', function (Blueprint $table) {
            // Menambahkan kolom product_id tepat setelah kolom id
            $table->foreignId('product_id')->nullable()->after('id')->constrained()->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('posters', function (Blueprint $table) {
            // Menghapus kembali kolom jika migrasi di-rollback
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
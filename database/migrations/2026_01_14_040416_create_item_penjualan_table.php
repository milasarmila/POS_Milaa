<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('item_penjualan', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);

            $table->foreign('produk_id')
                ->references('id')
                ->on('produk')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('item_penjualan', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);

            $table->foreign('produk_id')
                ->references('id')
                ->on('produk');
        });
    }
};
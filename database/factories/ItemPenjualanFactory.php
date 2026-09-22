<?php

namespace Database\Factories;

use App\Models\ItemPenjualan;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemPenjualan>
 */
class ItemPenjualanFactory extends Factory
{
    protected $model = ItemPenjualan::class;

    public function definition(): array
    {
        $kuantitas = fake()->numberBetween(1, 5);
        $hargaSatuan = fake()->numberBetween(10000, 500000);
        $subtotal = $kuantitas * $hargaSatuan;

        return [
            'penjualan_id' => Penjualan::factory(),
            'produk_id' => Produk::inRandomOrder()->first()?->id ?? Produk::factory(),
            'kuantitas' => $kuantitas, // Sudah diperbaiki dari 'kualitas' ke 'kuantitas'
            'harga_satuan' => $hargaSatuan,
            'subtotal' => $subtotal,
        ];
    }
}
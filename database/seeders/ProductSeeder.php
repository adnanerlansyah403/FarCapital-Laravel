<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            [
                "nama" => "Product 1",
                "harga" => 100000,
                "deskripsi" => "Deskripsi dari produk 1",
                "rating" => 4,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 10000,
            'description' => 'Deskripsi produk 1'
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 15000,
            'description' => 'Deskripsi produk 2'
        ]);
    }
}

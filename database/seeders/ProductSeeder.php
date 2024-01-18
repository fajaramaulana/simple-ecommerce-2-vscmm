<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([[
            'product_name' => 'Euodia',
            'product_price' => '1000980',
            'product_image' => 'https://images.unsplash.com/photo-1612837',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'product_name' => 'Euodia 2',
            'product_price' => '1000982',
            'product_image' => 'https://images.unsplash.com/photo-1612837',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}

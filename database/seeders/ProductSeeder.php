<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
          ['title' => 'produqti 1', 'price' => 10, 'user_id' => 10],
          ['title' => 'produqti 2', 'price' => 15, 'user_id' => 10],
          ['title' => 'produqti 3', 'price' => 8, 'user_id' => 10],
          ['title' => 'produqti 4', 'price' => 7, 'user_id' => 10],
          ['title' => 'produqti 5', 'price' => 20, 'user_id' => 10]
        ];

        foreach ($data as $productData) {
          Product::factory()->data($productData)->create();
        }
    }
}

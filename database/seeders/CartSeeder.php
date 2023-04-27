<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
          ['user_id' => 10, 'product_id' => 2, 'quantity' => 3],
          ['user_id' => 10, 'product_id' => 5, 'quantity' => 2],
          ['user_id' => 10, 'product_id' => 1, 'quantity' => 1],
        ];

        foreach($data as $cartItem) {
          DB::table('carts')->insert([
            'user_id' => $cartItem['user_id'],
            'product_id' => $cartItem['product_id'],
            'quantity' => $cartItem['quantity']
          ]);
        }
    }
}

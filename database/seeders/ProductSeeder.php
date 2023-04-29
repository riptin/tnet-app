<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
          ['title' => 'produqti 1', 'price' => 10, 'user_id' => 10],
          ['title' => 'produqti 2', 'price' => 15, 'user_id' => 10],
          ['title' => 'produqti 3', 'price' => 8, 'user_id' => 10],
          ['title' => 'produqti 4', 'price' => 7, 'user_id' => 10],
          ['title' => 'produqti 5', 'price' => 20, 'user_id' => 10]
        ];

        $cartItems = [
          ['user_id' => 15, 'product_id' => 1, 'quantity' => 1],
          ['user_id' => 15, 'product_id' => 2, 'quantity' => 3],
          ['user_id' => 15, 'product_id' => 5, 'quantity' => 2],
        ];

        foreach ($products as $product) {
          Product::create([
            'title'   => $product['title'],
            'price'   => $product['price'],
            'user_id' => $product['user_id']
          ]);
        }

        if ($user = User::find(15)) {
          foreach ($cartItems as $cartItem) {
            $user->cart_products()->attach($cartItem['product_id'], ['quantity' => $cartItem['quantity']]);
          }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductGroupItemSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
          ['group_id' => 1, 'product_id' => 2],
          ['group_id' => 1, 'product_id' => 5],
        ];

        foreach($data as $productGroup) {
          DB::table('product_group_items')->insert([
            'group_id' => $productGroup['group_id'],
            'product_id' => $productGroup['product_id']
          ]);
        }
    }
}

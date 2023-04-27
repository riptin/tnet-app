<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProductGroupSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_product_groups')->insert([
          'user_id' => 1,
          'discount' => 15
        ]);
    }
}

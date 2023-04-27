<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserProductGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        UserSeeder::class,
        ProductSeeder::class,
        UserProductGroupSeeder::class,
        ProductGroupItemSeeder::class,
        CartSeeder::class,
      ]);
    }
}

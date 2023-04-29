<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserProductGroup;
use Illuminate\Database\Seeder;

class UserProductGroupSeeder extends Seeder
{
    public function run(): void
    {
        $userProductGroup = UserProductGroup::create([
          'user_id'  => 1,
          'discount' => 15
        ]);

        $userProductGroup->products()->attach([2, 5]);
    }
}

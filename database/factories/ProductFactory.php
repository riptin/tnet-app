<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $data = [];

    public function definition(): array
    {
        return [
          'user_id' => $this->data['user_id'],
          'title' => $this->data['title'],
          'price' => $this->data['price']
        ];
    }

    public function data($data) {
      foreach($data as $key => $value) {
        $this->data[$key] = $value;
      }
      
      return $this;
    }
}

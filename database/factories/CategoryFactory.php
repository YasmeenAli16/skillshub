<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Category::class;

    public function definition()
    {
        return [
           'name' => json_encode([
               'en' => $this->faker->word(),
               'ar' => $this->faker->word(),
           ])

        ];
    }
}

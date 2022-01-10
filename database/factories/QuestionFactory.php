<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Question::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'option_1' => $this->faker->sentence(5, true),
            'option_2' => $this->faker->sentence(5, true),
            'option_3' => $this->faker->sentence(5, true),
            'option_4' => $this->faker->sentence(5, true),
            'right_ans' => $this->faker->numberBetween(1, 4),
        ];
    }
}

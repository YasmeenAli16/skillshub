<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skill;
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Skill::class;

    public function definition()
    {
        static $i = 0;
        $i++;
        return [
            'name' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),

            "img" => "skills/$i.png",
        ];
    }
}

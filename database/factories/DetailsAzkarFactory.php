<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailsAzkar>
 */
class DetailsAzkarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title_ar"=>$this->faker->text(15),
            "title_en"=>$this->faker->text(15),
            "reward_ar"=>$this->faker->text(15),
            "reward_en"=>$this->faker->text(15),
            "repeat"=>2,
            "cateogry_azkars_id"=>1,
        ];
    }
}

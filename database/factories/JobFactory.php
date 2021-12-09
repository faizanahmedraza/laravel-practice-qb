<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'min_salary' => $this->faker->numberBetween(5000,10000),
            'max_salary' => $this->faker->numberBetween(10000,20000),
        ];
    }
}

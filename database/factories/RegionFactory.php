<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regions = config('regions');
        return [
            'name' => $this->faker->unique()->randomElement($regions)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countries = config('countries');
        return [
            'name' => $this->faker->unique()->randomElement($countries),
            'region_id' => Region::factory(),
        ];
    }
}

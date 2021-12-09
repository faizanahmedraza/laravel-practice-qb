<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'job_id' => $this->faker->randomElement(Job::pluck('id')->toArray()),
            'salary' => $this->faker->numberBetween(9000,20000),
            'department_id' => Department::factory(),
        ];
    }
}

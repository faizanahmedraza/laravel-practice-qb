<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Location;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           Job::factory(10)->create(),
           Location::factory(10)->create(),
           Employee::factory(10)->create()
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

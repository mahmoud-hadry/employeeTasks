<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    private $faker;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(10)->create();
        \Faker\Factory::create()->unique(true);
    }
}

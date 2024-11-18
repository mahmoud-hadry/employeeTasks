<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(50)->create()->each(function ($employee) {
            // Assign a random manager, ensuring it's not the employee itself
            $manager = Employee::inRandomOrder()->where('id', '!=', $employee->id)->first();
            if ($manager) {
                $employee->update(['manager_id' => $manager->id]);
            }
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        static $hashedPassword;

        // Hash password only once for performance
        if (!$hashedPassword) {
            $hashedPassword = Hash::make('P@$$w0rd');
        }

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'password' => $hashedPassword,
            'salary' => $this->faker->numberBetween(10000, 50000),
            'manager_id' => 1,
            'department_id' => 1,
            'image' => 'https://i.pravatar.cc/150?img=' . $this->faker->numberBetween(1, 70),
        ];
    }
}

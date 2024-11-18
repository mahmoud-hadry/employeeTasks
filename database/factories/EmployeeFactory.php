<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'password' => Hash::make('P@$$w0rd'),
            'salary' => $this->faker->numberBetween(10000, 50000),
            'manager_id' => Employee::factory(),
            'department_id' => Department::factory(),
            'image' => 'https://i.pravatar.cc/150?img=' . $this->faker->numberBetween(1, 70), // Random placeholder image
        ];
    }
}

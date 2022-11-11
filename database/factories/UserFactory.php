<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        User::create([
            'fname' => "Admin",
            'lname' => "Admin",
            'email' => "admin@gmail.com",
            'phone'=> $this->faker->phoneNumber(),
            'status'=> 'active',
            'role'=> 'admin',
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'fname' => "supervisor",
            'lname' => "supervisor",
            'email' => "supervisor@gmail.com",
            'phone'=> $this->faker->phoneNumber(),
            'status'=> 'active',
            'role'=> 'supervisor',
            'email_verified_at' => now(),
            'level_id'=> Level::all()->random()->id,
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ]);
        return [
            'fname' => Str::words($this->faker->name(), 1),
            'lname' => Str::words($this->faker->name(), 1),
            'email' => "doc@gmail.com",
            'phone'=> $this->faker->phoneNumber(),
            'address'=> $this->faker->address(),
            'bio'=> $this->faker->paragraph(),
            'status'=> 'active',
            'role'=> 'professor',
            'email_verified_at' => now(),
            'level_id'=> Level::all()->random()->id,
            'password' => 'password', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
                'level_id'=> Level::all()->random()->id,
            ];
        });
    }
}

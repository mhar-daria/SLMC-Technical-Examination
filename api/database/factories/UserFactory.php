<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition() {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEMail,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition() {
        return [
            'title' => $this->faker->realText(rand(5, 10)),
            'completed' => $this->boolean(50),
        ];
    }
}

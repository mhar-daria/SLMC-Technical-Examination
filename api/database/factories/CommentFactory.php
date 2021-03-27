<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition() {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'body' => $this->faker->realText(rand(10,50)),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition() {
        return [
            'title' => $this->faker->realText(rand(10, 20)),
            'body' => $this->faker->paragraph(20),
        ];
    }
}

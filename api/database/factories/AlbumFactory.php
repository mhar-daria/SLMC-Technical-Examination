<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition() {
        return [
            'title' => $this->faker->name,
        ];
    }
}

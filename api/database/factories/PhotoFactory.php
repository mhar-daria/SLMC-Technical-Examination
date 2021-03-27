<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition() {
        $imageWidth = 1024;
        $imageHeight = 768;

        return [
            'title' => $this->faker->name,
            'url' => $this->faker->imageUrl($imageWidth, $imageHeight, 'cats', true, 'Faker', true),
            'thumbnailUrl' => $this->faker->imageUrl(60, 60, 'cats', true, 'Faker', true),
        ];
    }
}

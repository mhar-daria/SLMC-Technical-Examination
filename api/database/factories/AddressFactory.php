<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition() {
        return [
            'street' => $this->faker->streetAddress,
            'suite' => $this->faker->secondaryAddress,
            'city' => $this->faker->cityName,
            'zipcode' => $this->faker->areaCode,
            'geo' => [
                'longitude' => $this->faker->longitude,
                'latitude' => $this->faker->latitude,
            ]
        ];
    }
}

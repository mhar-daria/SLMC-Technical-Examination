<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factory;

/**
 * 
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition() {
        return [
            'name' => $this->faker->company,
            'catchPhrase' => $this->faker->catchPhrase,
            'bs' => $this->faker->bs,
        ];
    }
}

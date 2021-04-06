<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * 
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition() {
        $salt = Str::random(10);
        $rawPassword = Str::random(20);

        $hashedPassword = Hash::make("{$rawPassword}.{$salt}");

        return [
            'password' => $hashedPassword,
            'salt' => $salt,
        ];
    }
}

<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

/**
 * Custom validation of password
 */
class CustomAuthProvider extends EloquentUserProvider {

    /**
     * Validate Credentials
     *
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials) {
        $plain = $credentials['password'];
        $rawPasswordWithSalt = "{$plain}.{$user->salt}";

        return $this->hasher->check($rawPasswordWithSalt, $user->getAuthPassword());
    }
}

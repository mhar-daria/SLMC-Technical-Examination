<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    /**
     * Company
     *
     * @return \App\Models\Company
     */
    public function company() {
        return $this->hasOne(Company::class, 'userId');
    }

    /**
     * Company
     *
     * @return \App\Models\Address
     */
    public function address() {
        return $this->hasOne(Address::class, 'userId');
    }

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'website',
    ];
}
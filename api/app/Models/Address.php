<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Observers\AddressObserver;

class Address extends Model {
    /**
     * Company
     *
     * @return \App\Models\User
     */
    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    protected $fillable = [
        'street',
        'suite',
        'city',
        'userId',
        'zipcode',
        'geo',
    ];

    public static function boot() {
        parent::boot();

        Address::observe(AddressObserver::class);
    }
}
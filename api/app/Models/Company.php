<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    /**
     * Company
     *
     * @return \App\Models\User
     */
    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    protected $fillable = [
        'name',
        'catchPhrase',
        'bs',
        'userId',
    ];
}
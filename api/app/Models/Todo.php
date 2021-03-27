<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    /**
     * User
     *
     * @return \App\Models\User
     */
    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    protected $fillable = [
        'userId',
        'title',
        'completed',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    /**
     * User
     *
     * @return \App\Models\User
     */
    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Photo
     *
     * @return \App\Models\Photo
     */
    public function photo() {
        return $this->hasOne(Photo::class, 'albumId');
    }

    protected $fillable = [
        'userId',
        'title',
    ];
}
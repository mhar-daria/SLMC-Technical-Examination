<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    /**
     * Album
     *
     * @return \App\Models\Album
     */
    public function album() {
        return $this->belongsTo(Album::class, 'albumId');
    }

    protected $fillable = [
        'albumId',
        'title',
        'url',
        'thumbnailUrl',
    ];
}
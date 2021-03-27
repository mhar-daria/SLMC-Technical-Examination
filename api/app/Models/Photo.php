<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model implements Presentable, Transformable{
    use PresentableTrait, TransformableTrait;
    // use HasFactory;
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
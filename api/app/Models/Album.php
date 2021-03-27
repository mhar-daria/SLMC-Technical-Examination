<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Album extends Model implements Presentable, Transformable {
    use PresentableTrait, TransformableTrait;

    // use HasFactory;
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
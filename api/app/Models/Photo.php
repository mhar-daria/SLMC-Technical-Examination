<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Traits\UuidTrait;

class Photo extends Model implements Presentable, Transformable{
    use PresentableTrait, TransformableTrait, UuidTrait;
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

    public function transform() {
        return [
            'id' => (int) $this->id,
            'albumId' => $this->albumId,
            'url' => $this->url,
            'thumbnailUrl' => $this->thumbnailUrl,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at)),
        ];
    }
}
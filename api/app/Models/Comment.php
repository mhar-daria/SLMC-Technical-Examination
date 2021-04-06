<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Traits\UuidTrait;

class Comment extends Model implements Presentable, Transformable {
    use PresentableTrait, TransformableTrait, UuidTrait;
    // use HasFactory;
    /**
     * Post
     *
     * @return \App\Models\Post
     */
    public function post() {
        return $this->belongsTo(Post::class, 'postId');
    }

    protected $fillable = [
        'postId',
        'name',
        'email',
        'body',
    ];

    public function transform() {
        return [
            'id' => (int) $this->id,
            'postId' => $this->postId,
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->udpated_at)),
        ];
    }
}
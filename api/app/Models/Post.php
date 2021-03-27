<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Presentable, Transformable {
    use PresentableTrait, TransformableTrait;

    // use HasFactory;
    /**
     * Comment
     *
     * @return \App\Models\Comment
     */
    public function comments() {
        return $this->hasMany(Comment::class, 'postId');
    }

    protected $fillable = [
        'title',
        'body',
        'userId',
    ];

    public function transform() {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'userId' => $this->userId,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->udpated_at)),
        ];
    }
}
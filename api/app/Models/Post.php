<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    /**
     * Comment
     *
     * @return \App\Models\Comment
     */
    public function comment() {
        return $this->hasOne(Comment::class, 'postId');
    }

    protected $fillable = [
        'title',
        'body',
        'userId',
    ];
}
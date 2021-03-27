<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
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
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Traits\UuidTrait;

class Todo extends Model implements Presentable, Transformable{
    use PresentableTrait, TransformableTrait, UuidTrait;

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

    public function transform() {
        return [
            'id' => (int) $this->id,
            'userId' => (int) $this->userId,
            'title' => $this->title,
            'completed' => $this->completed,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at)),
        ];
    }
}
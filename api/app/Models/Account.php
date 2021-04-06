<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Traits\UuidTrait;

class Account extends Model implements Presentable, Transformable {
    use TransformableTrait, PresentableTrait, UuidTrait;

    /**
     * This will return user account
     * @return mixed
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @var array
     */
    protected $fillable = [
        'password',
        'salt',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * @var array
     */
    public function transform() {
        return [
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at)),
        ];
    }
}
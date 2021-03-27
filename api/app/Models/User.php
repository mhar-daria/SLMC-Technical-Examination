<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements Presentable, Transformable {
    use TransformableTrait, PresentableTrait;
    // use HasFactory;
    /**
     * Company
     *
     * @return \App\Models\Company
     */
    public function company() {
        return $this->hasOne(Company::class, 'userId');
    }

    /**
     * Posts
     *
     * @return \App\Models\Post
     */
    public function posts() {
        return $this->hasMany(Post::class, 'userId');
    }

    /**
     * Album
     *
     * @return \App\Models\Album
     */
    public function albums() {
        return $this->hasOne(Album::class, 'userId');
    }

    /**
     * Company
     *
     * @return \App\Models\Address
     */
    public function address() {
        return $this->hasOne(Address::class, 'userId');
    }

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'website',
    ];

    public function transform() {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at)),
        ];
    }
}
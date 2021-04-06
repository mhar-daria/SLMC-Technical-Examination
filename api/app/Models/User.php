<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Traits\UuidTrait;

use Tymon\JWTAuth\Contracts\JWTSubject;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizeable;

class User extends Model implements Presentable, Transformable, JWTSubject {
    use TransformableTrait, PresentableTrait, UuidTrait, Authenticatable;

    /**
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->account->password;
    }

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

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'website',
    ];

    /**
     * @var array
     */
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
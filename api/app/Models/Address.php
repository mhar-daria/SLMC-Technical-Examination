<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Observers\AddressObserver;

class Address extends Model implements Presentable, Transformable {
    use PresentableTrait, TransformableTrait;

    // use HasFactory;
    /**
     * Company
     *
     * @return \App\Models\User
     */
    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    protected $fillable = [
        'street',
        'suite',
        'city',
        'userId',
        'zipcode',
        'geo',
    ];

    public static function boot() {
        parent::boot();

        Address::observe(AddressObserver::class);
    }

    public function trasnform() {
        return [
            'street' => $this->street,
            'suite' => $this->suite,
            'city' => $this->city,
            'userId' => (int) $this->userId,
            'zipcode' => $this->zipcode,
            'geo' => json_decode($this->geo, true) ?? [],
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at))
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model implements Presentable, Transformable {
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
        'name',
        'catchPhrase',
        'bs',
        'userId',
    ];

    protected $table = 'companies';

    public function transform() {
        return [
            'name' => $this->name,
            'catchPhrase' => $this->catchPhrase,
            'bs' => $this->bs,
            'userId' => (int) $this->userId,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at))
        ];
    }
}
<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Uuid
 */
trait UuidTrait {
    /**
     * @boot
     */
    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }


    /**
     * ID is incrementing
     *
     * @return bool
     */
    public function getIncrementing() {
        return false;
    }

    /**
     * key type
     * @return string
     */
    public function getKeyType() {
        return 'string';
    }
}

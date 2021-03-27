<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Address;

/**
 * Class AddressTransformer.
 *
 * @package namespace App\Transformers;
 */
class AddressTransformer extends TransformerAbstract
{
    /**
     * Transform the Address entity.
     *
     * @param \App\Models\Address $model
     *
     * @return array
     */
    public function transform(Address $model)
    {
        return [
            'street' => $model->street,
            'suite' => $model->suite,
            'city' => $model->city,
            'userId' => (int) $model->userId,
            'zipcode' => $model->zipcode,
            'geo' => json_decode($model->geo, true) ?? [],
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at))
        ];
    }
}

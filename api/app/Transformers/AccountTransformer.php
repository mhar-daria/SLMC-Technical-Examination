<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Account;

/**
 * Class AccountTransformer.
 *
 * @package namespace App\Transformers;
 */
class AccountTransformer extends TransformerAbstract
{
    /**
     * Transform the Account entity.
     *
     * @param \App\Models\Account $model
     *
     * @return array
     */
    public function transform(Account $model)
    {
        return [
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at)),
        ];
    }
}

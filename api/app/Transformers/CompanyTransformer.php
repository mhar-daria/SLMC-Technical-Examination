<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Company;

/**
 * Class CompanyTransformer.
 *
 * @package namespace App\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
{
    /**
     * Transform the Company entity.
     *
     * @param \App\Models\Company $model
     *
     * @return array
     */
    public function transform(Company $model)
    {
        return [
            'name' => $model->name,
            'catchPhrase' => $model->catchPhrase,
            'bs' => $model->bs,
            'userId' => (int) $model->userId,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at))
        ];
    }
}

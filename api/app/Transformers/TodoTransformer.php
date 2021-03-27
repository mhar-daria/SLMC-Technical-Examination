<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Todo;

/**
 * Class TodoTransformer.
 *
 * @package namespace App\Transformers;
 */
class TodoTransformer extends TransformerAbstract
{
    /**
     * Transform the Todo entity.
     *
     * @param \App\Models\Todo $model
     *
     * @return array
     */
    public function transform(Todo $model)
    {
        return [
            'id' => (int) $model->id,
            'userId' => (int) $model->userId,
            'title' => $model->title,
            'completed' => $model->completed,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at)),
        ];
    }
}

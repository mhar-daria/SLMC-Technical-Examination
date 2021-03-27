<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Photo;

/**
 * Class PhotoTransformer.
 *
 * @package namespace App\Transformers;
 */
class PhotoTransformer extends TransformerAbstract
{
    /**
     * Transform the Photo entity.
     *
     * @param \App\Models\Photo $model
     *
     * @return array
     */
    public function transform(Photo $model)
    {
        return [
            'id' => (int) $model->id,
            'albumId' => $model->albumId,
            'url' => $model->url,
            'thumbnailUrl' => $model->thumbnailUrl,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at)),
        ];
    }
}

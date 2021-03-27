<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Album;

/**
 * Class AlbumTransformer.
 *
 * @package namespace App\Transformers;
 */
class AlbumTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['photos'];

    /**
     * Transform the Album entity.
     *
     * @param \App\Models\Album $model
     *
     * @return array
     */
    public function transform(Album $model)
    {
        return [
            'id' => (int) $model->id,
            'userId' => $model->userId,
            'title' => $model->title,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->updated_at)),
        ];
    }

    public function includePhotos(Album $model) {
        if ($model->photos) {
            return $this->collection($model->photos, new PhotoTransformer());
        }

        return $this->null();
    }
}

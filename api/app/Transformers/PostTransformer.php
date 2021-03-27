<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Post;

/**
 * Class PostTransformer.
 *
 * @package namespace App\Transformers;
 */
class PostTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['comments'];

    /**
     * Transform the Post entity.
     *
     * @param \App\Models\Post $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        return [
            'id' => (int) $model->id,
            'title' => $model->title,
            'body' => $model->body,
            'userId' => $model->userId,
            'created_at' => date('Y-m-d H:i:s', strtotime($model->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($model->udpated_at)),
        ];
    }

    public function includeComments(Post $model) {
        if ($model->comments) {
            return $this->collection($model->comments, new CommentTransformer());
        }
        return [];
    }
}

<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 *
 * @package namespace App\Criteria;
 */
class PostCommentsCriteria implements CriteriaInterface
{

    /**
     * @var int
     */
    protected $postId;

    /**
     * @constructor
     */
    public function __construct($postId) {
        $this->postId = $postId;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where(['postId' => $this->postId]);
    }
}

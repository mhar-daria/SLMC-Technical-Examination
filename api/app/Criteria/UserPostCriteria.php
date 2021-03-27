<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 *
 * @package namespace App\Criteria;
 */
class UserPostCriteria implements CriteriaInterface
{

    /**
     * @var int
     */
    protected $userId;

    /**
     * @constructor
     */
    public function __construct($userId) {
        $this->userId = $userId;
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
        return $model->where('userId', $this->userId);
    }
}

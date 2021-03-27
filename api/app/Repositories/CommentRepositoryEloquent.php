<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CommentRepository;
use App\Models\Comment;
use App\Validators\CommentValidator;
use App\Criteria\CustomRequestCriteria;
use App\Presenters\CommentPresenter;
use App\Traits\FirstOrFailTrait;

/**
 * Class CommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{
    use FirstOrFailTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }

    public function presenter() {
        return CommentPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CustomRequestCriteria::class));
    }
    
}

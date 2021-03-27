<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TodoRepository;
use App\Models\Todo;
use App\Validators\TodoValidator;
use App\Presenters\TodoPresenter;
use App\Traits\FirstOrFailTrait;
use App\Criteria\CustomRequestCriteria;

/**
 * Class TodoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TodoRepositoryEloquent extends BaseRepository implements TodoRepository
{
    use FirstOrFailTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Todo::class;
    }

    public function presenter() {
        return TodoPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CustomRequestCriteria::class));
    }
    
}

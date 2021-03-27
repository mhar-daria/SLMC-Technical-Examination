<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PhotoRepository;
use App\Models\Photo;
use App\Validators\PhotoValidator;
use App\Criteria\CustomRequestCriteria;
use App\Traits\FirstOrFailTrait;
use App\Presenters\PhotoPresenter;

/**
 * Class PhotoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PhotoRepositoryEloquent extends BaseRepository implements PhotoRepository
{
    use FirstOrFailTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Photo::class;
    }

    public function pesenter() {
        return PhotoPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CustomRequestCriteria::class));
    }
    
}

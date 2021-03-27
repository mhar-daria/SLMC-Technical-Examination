<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AlbumRepository;
use App\Models\Album;
use App\Validators\AlbumValidator;
use App\Criteria\CustomRequestCriteria;
use App\Traits\FirstOrFailTrait;
use App\Presenters\AlbumPresenter;

/**
 * Class AlbumRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AlbumRepositoryEloquent extends BaseRepository implements AlbumRepository
{
    use FirstOrFailTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Album::class;
    }

    public function presenter() {
        return AlbumPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CustomRequestCriteria::class));
    }
    
}

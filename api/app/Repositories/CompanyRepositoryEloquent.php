<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CompanyRepository;
use App\Models\Company;
use App\Validators\CompanyValidator;
use App\Presenters\CompanyPresenter;
use App\Traits\FirstOrFailTrait;
use App\Criteria\CustomRequestCriteria;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository
{
    use FirstOrFailTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    public function presenter() {
        return CompanyPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(CustomRequestCriteria::class));
    }
    
}

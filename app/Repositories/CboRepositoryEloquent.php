<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\CboRepository;
use SA\Models\Cbo;
use SA\Validators\CboValidator;

/**
 * Class CboRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class CboRepositoryEloquent extends BaseRepository implements CboRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cbo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

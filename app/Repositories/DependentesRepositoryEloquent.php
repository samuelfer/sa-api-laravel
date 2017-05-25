<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\DependentesRepository;
use SA\Models\Dependentes;
use SA\Validators\DependentesValidator;

/**
 * Class DependentesRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class DependentesRepositoryEloquent extends BaseRepository implements DependentesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Dependentes::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

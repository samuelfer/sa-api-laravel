<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\MultaRepository;
use SA\Models\Multa;
use SA\Validators\MultaValidator;

/**
 * Class MultaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class MultaRepositoryEloquent extends BaseRepository implements MultaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Multa::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

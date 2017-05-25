<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\FabricanteRepository;
use SA\Models\Fabricante;
use SA\Validators\FabricanteValidator;

/**
 * Class FabricanteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class FabricanteRepositoryEloquent extends BaseRepository implements FabricanteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Fabricante::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

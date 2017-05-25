<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\RacaRepository;
use SA\Models\Raca;
use SA\Validators\RacaValidator;

/**
 * Class RacaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class RacaRepositoryEloquent extends BaseRepository implements RacaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Raca::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

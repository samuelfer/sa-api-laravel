<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\VisitaRepository;
use SA\Models\Visita;
use SA\Validators\VisitaValidator;

/**
 * Class VisitaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class VisitaRepositoryEloquent extends BaseRepository implements VisitaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Visita::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

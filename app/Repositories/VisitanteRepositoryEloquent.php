<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\visitanteRepository;
use SA\Models\Visitante;
use SA\Validators\VisitanteValidator;

/**
 * Class VisitanteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class VisitanteRepositoryEloquent extends BaseRepository implements VisitanteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Visitante::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

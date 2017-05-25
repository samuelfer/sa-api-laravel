<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoVisitanteRepository;
use SA\Models\TipoVisitante;
use SA\Validators\TipoVisitanteValidator;

/**
 * Class TipoVisitanteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoVisitanteRepositoryEloquent extends BaseRepository implements TipoVisitanteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoVisitante::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

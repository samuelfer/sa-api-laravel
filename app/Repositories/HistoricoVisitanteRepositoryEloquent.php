<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\historicoVisitanteRepository;
use SA\Models\HistoricoVisitante;
use SA\Validators\HistoricoVisitanteValidator;

/**
 * Class HistoricoVisitanteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class HistoricoVisitanteRepositoryEloquent extends BaseRepository implements HistoricoVisitanteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HistoricoVisitante::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\AchadosPerdidosRepository;
use SA\Models\AchadosPerdidos;


/**
 * Class AchadosPerdidosRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AchadosPerdidosRepositoryEloquent extends BaseRepository implements AchadosPerdidosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AchadosPerdidos::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function applyMultitenancy()
    {
        Reserva::clearBootedModels();
    }
}

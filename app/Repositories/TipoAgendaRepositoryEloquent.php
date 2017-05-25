<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoAgendaRepository;
use SA\Models\TipoAgenda;
use SA\Validators\TipoAgendaValidator;

/**
 * Class TipoAgendaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoAgendaRepositoryEloquent extends BaseRepository implements TipoAgendaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoAgenda::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

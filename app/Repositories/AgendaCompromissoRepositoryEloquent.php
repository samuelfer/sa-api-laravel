<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\agenda_compromissoRepository;
use SA\Models\AgendaCompromisso;
use SA\Validators\AgendaCompromissoValidator;

/**
 * Class AgendaCompromissoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AgendaCompromissoRepositoryEloquent extends BaseRepository implements AgendaCompromissoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AgendaCompromisso::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

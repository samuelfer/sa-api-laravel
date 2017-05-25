<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\historicoRepository;
use SA\Models\Historico;
use SA\Validators\HistoricoValidator;

/**
 * Class HistoricoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class HistoricoRepositoryEloquent extends BaseRepository implements HistoricoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Historico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

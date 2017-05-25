<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoReceitaRepository;
use SA\Models\TipoReceita;
use SA\Validators\TipoReceitaValidator;

/**
 * Class TipoReceitaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoReceitaRepositoryEloquent extends BaseRepository implements TipoReceitaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoReceita::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

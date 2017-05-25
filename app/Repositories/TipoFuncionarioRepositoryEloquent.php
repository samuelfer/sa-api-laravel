<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoFuncionarioRepository;
use SA\Models\TipoFuncionario;
use SA\Validators\TipoFuncionarioValidator;

/**
 * Class TipoFuncionarioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoFuncionarioRepositoryEloquent extends BaseRepository implements TipoFuncionarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoFuncionario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

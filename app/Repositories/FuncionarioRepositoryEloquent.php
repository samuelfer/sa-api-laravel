<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\FuncionarioRepository;
use SA\Models\Funcionario;
use SA\Validators\FuncionarioValidator;

/**
 * Class FuncionarioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class FuncionarioRepositoryEloquent extends BaseRepository implements FuncionarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Funcionario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

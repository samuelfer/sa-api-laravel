<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\MultaVeiculoRepository;
use SA\Models\MultaVeiculo;
use SA\Validators\MultaVeiculoValidator;

/**
 * Class MultaVeiculoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class MultaVeiculoRepositoryEloquent extends BaseRepository implements MultaVeiculoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MultaVeiculo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

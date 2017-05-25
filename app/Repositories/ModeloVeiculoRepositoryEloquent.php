<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\ModeloVeiculoRepository;
use SA\Models\ModeloVeiculo;
use SA\Validators\ModeloVeiculoValidator;

/**
 * Class ModeloVeiculoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ModeloVeiculoRepositoryEloquent extends BaseRepository implements ModeloVeiculoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ModeloVeiculo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

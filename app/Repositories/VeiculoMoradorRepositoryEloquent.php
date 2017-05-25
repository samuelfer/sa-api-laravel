<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\VeiculoMoradorRepository;
use SA\Models\VeiculoMorador;
use SA\Validators\VeiculoMoradorValidator;

/**
 * Class VeiculoMoradorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class VeiculoMoradorRepositoryEloquent extends BaseRepository implements VeiculoMoradorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VeiculoMorador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

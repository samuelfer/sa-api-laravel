<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\ConsumoGasRepository;
use SA\Models\ConsumoGas;
use SA\Validators\ConsumoGasValidator;

/**
 * Class ConsumoGasRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ConsumoGasRepositoryEloquent extends BaseRepository implements ConsumoGasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConsumoGas::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

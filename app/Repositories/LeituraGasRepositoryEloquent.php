<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\LeituraGasRepository;
use SA\Models\LeituraGas;
use SA\Validators\LeituraGasValidator;

/**
 * Class LeituraGasRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class LeituraGasRepositoryEloquent extends BaseRepository implements LeituraGasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LeituraGas::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

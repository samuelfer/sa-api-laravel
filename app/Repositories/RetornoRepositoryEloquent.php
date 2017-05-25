<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\RetornoRepository;
use SA\Models\Retorno;
use SA\Validators\RetornoValidator;

/**
 * Class RetornoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class RetornoRepositoryEloquent extends BaseRepository implements RetornoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Retorno::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

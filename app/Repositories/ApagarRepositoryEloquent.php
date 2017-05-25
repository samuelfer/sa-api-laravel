<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\apagarRepository;
use SA\Models\Apagar;
use SA\Validators\ApagarValidator;

/**
 * Class ApagarRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ApagarRepositoryEloquent extends BaseRepository implements ApagarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Apagar::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

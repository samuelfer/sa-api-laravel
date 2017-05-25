<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\GaragemRepository;
use SA\Models\Garagem;
use SA\Validators\GaragemValidator;

/**
 * Class GaragemRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class GaragemRepositoryEloquent extends BaseRepository implements GaragemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Garagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

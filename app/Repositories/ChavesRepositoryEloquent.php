<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\ChavesRepository;
use SA\Models\Chaves;
use SA\Validators\ChavesValidator;

/**
 * Class ChavesRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ChavesRepositoryEloquent extends BaseRepository implements ChavesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chaves::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

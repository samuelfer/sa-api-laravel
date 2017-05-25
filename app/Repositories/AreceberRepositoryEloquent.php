<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\areceberRepository;
use SA\Models\Areceber;
use SA\Validators\AreceberValidator;

/**
 * Class AreceberRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AreceberRepositoryEloquent extends BaseRepository implements AreceberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Areceber::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

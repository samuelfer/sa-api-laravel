<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\EspecieRepository;
use SA\Models\Especie;
use SA\Validators\EspecieValidator;

/**
 * Class EspecieRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class EspecieRepositoryEloquent extends BaseRepository implements EspecieRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Especie::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

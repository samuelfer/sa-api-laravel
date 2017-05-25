<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\avisoRepository;
use SA\Models\Aviso;
use SA\Validators\AvisoValidator;

/**
 * Class AvisoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AvisoRepositoryEloquent extends BaseRepository implements AvisoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Aviso::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

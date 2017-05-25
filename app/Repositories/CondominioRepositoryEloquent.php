<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\condominioRepository;
use SA\Models\Condominio;


/**
 * Class CondominioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class CondominioRepositoryEloquent extends BaseRepository implements CondominioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Condominio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

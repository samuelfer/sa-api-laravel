<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\MoradorRepository;
use SA\Models\Morador;
use SA\Validators\MoradorValidator;

/**
 * Class MoradorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class MoradorRepositoryEloquent extends BaseRepository implements MoradorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Morador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

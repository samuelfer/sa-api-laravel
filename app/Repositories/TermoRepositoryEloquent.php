<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TermoRepository;
use SA\Models\Termo;
use SA\Validators\TermoValidator;

/**
 * Class TermoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TermoRepositoryEloquent extends BaseRepository implements TermoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Termo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

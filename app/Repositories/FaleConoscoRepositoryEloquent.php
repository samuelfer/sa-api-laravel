<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\FaleConoscoRepository;
use SA\Models\FaleConosco;
use SA\Validators\FaleConoscoValidator;

/**
 * Class FaleConoscoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class FaleConoscoRepositoryEloquent extends BaseRepository implements FaleConoscoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FaleConosco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

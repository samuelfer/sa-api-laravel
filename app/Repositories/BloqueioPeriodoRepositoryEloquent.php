<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\bloqueio_periodoRepository;
use SA\Models\BloqueioPeriodo;
use SA\Validators\BloqueioPeriodoValidator;

/**
 * Class BloqueioPeriodoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class BloqueioPeriodoRepositoryEloquent extends BaseRepository implements BloqueioPeriodoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BloqueioPeriodo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

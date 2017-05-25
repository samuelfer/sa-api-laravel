<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\MovimentoRepository;
use SA\Models\Movimento;
use SA\Validators\MovimentoValidator;

/**
 * Class MovimentoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class MovimentoRepositoryEloquent extends BaseRepository implements MovimentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Movimento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

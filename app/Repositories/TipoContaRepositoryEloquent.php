<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoContaRepository;
use SA\Models\TipoConta;
use SA\Validators\TipoContaValidator;

/**
 * Class TipoContaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoContaRepositoryEloquent extends BaseRepository implements TipoContaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoConta::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

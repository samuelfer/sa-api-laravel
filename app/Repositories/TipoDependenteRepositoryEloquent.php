<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoDependenteRepository;
use SA\Models\TipoDependente;
use SA\Validators\TipoDependenteValidator;

/**
 * Class TipoDependenteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoDependenteRepositoryEloquent extends BaseRepository implements TipoDependenteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoDependente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

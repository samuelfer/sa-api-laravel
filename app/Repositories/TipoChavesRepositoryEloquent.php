<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoChavesRepository;
use SA\Models\TipoChaves;
use SA\Validators\TipoChavesValidator;

/**
 * Class TipoChavesRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoChavesRepositoryEloquent extends BaseRepository implements TipoChavesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoChaves::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

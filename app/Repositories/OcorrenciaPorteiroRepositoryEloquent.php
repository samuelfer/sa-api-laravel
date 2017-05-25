<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\OcorrenciaPorteiroRepository;
use SA\Models\OcorrenciaPorteiro;
use SA\Validators\OcorrenciaPorteiroValidator;

/**
 * Class OcorrenciaPorteiroRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class OcorrenciaPorteiroRepositoryEloquent extends BaseRepository implements OcorrenciaPorteiroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OcorrenciaPorteiro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

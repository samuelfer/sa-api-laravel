<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoOcorrenciaRepository;
use SA\Models\TipoOcorrencia;
use SA\Validators\TipoOcorrenciaValidator;

/**
 * Class TipoOcorrenciaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoOcorrenciaRepositoryEloquent extends BaseRepository implements TipoOcorrenciaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoOcorrencia::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

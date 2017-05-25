<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\CorrespondenciaRepository;
use SA\Models\Correspondencia;
use SA\Validators\CorrespondenciaValidator;

/**
 * Class CorrespondenciaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class CorrespondenciaRepositoryEloquent extends BaseRepository implements CorrespondenciaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Correspondencia::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

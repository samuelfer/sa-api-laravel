<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\OcorrenciaMoradorRepository;
use SA\Models\OcorrenciaMorador;
use SA\Validators\OcorrenciaMoradorValidator;

/**
 * Class OcorrenciaMoradorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class OcorrenciaMoradorRepositoryEloquent extends BaseRepository implements OcorrenciaMoradorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OcorrenciaMorador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

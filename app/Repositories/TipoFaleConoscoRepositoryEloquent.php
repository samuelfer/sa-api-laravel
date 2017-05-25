<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoFaleConoscoRepository;
use SA\Models\TipoFaleConosco;
use SA\Validators\TipoFaleConoscoValidator;

/**
 * Class TipoFaleConoscoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoFaleConoscoRepositoryEloquent extends BaseRepository implements TipoFaleConoscoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoFaleConosco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

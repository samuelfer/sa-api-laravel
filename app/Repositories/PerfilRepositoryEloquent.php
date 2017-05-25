<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\PerfilRepository;
use SA\Models\Perfil;
use SA\Validators\PerfilValidator;

/**
 * Class PerfilRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class PerfilRepositoryEloquent extends BaseRepository implements PerfilRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Perfil::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

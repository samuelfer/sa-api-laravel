<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoPerfilRepository;
use SA\Models\TipoPerfil;
use SA\Validators\TipoPerfilValidator;

/**
 * Class TipoPerfilRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoPerfilRepositoryEloquent extends BaseRepository implements TipoPerfilRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoPerfil::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoGrupoPerfilRepository;
use SA\Models\TipoGrupoPerfil;
use SA\Validators\TipoGrupoPerfilValidator;

/**
 * Class TipoGrupoPerfilRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoGrupoPerfilRepositoryEloquent extends BaseRepository implements TipoGrupoPerfilRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoGrupoPerfil::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

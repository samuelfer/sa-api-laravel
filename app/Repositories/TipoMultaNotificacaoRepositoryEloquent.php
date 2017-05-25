<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoMultaNotificacaoRepository;
use SA\Models\TipoMultaNotificacao;
use SA\Validators\TipoMultaNotificacaoValidator;

/**
 * Class TipoMultaNotificacaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoMultaNotificacaoRepositoryEloquent extends BaseRepository implements TipoMultaNotificacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoMultaNotificacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\MultaNotificacaoRepository;
use SA\Models\MultaNotificacao;
use SA\Validators\MultaNotificacaoValidator;

/**
 * Class MultaNotificacaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class MultaNotificacaoRepositoryEloquent extends BaseRepository implements MultaNotificacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MultaNotificacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

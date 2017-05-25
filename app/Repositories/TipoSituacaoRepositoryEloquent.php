<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoSituacaoRepository;
use SA\Models\TipoSituacao;
use SA\Presenters\TipoSituacaoPresenter;

/**
 * Class TipoSituacaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoSituacaoRepositoryEloquent extends BaseRepository implements TipoSituacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoSituacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

//    public function presenter()
//    {
//        return TipoSituacaoPresenter::class;
//    }
}

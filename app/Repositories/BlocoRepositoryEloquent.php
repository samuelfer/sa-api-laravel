<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\blocoRepository;
use SA\Models\Bloco;
use SA\Presenters\BlocoPresenter;

/**
 * Class BlocoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class BlocoRepositoryEloquent extends BaseRepository implements BlocoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bloco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


//    public function presenter()
//   {
//      return BlocoPresenter::class;
//    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\imovelRepository;
use SA\Models\Imovel;
use SA\Presenters\ImovelPresenter;

/**
 * Class ImovelRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ImovelRepositoryEloquent extends BaseRepository implements ImovelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Imovel::class;
    }

//    public function presenter()
//    {
//        return ImovelPresenter::class;
//    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

//    public function presenter()
//    {
//        return ImovelPresenter::class;
//    }

//    public function applyMultitenancy()
//    {
//        BillPay::clearBootedModels();
//    }


}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\bancoRepository;
use SA\Models\Banco;
use SA\Validators\BancoValidator;

/**
 * Class BancoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class BancoRepositoryEloquent extends BaseRepository implements BancoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banco::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\Conta_correnteRepository;
use SA\Models\ContaCorrente;
use SA\Validators\ContaCorrenteValidator;

/**
 * Class ContaCorrenteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ContaCorrenteRepositoryEloquent extends BaseRepository implements ContaCorrenteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContaCorrente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

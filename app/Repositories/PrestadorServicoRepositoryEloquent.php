<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\PrestadorServicoRepository;
use SA\Models\PrestadorServico;
use SA\Validators\PrestadorServicoValidator;

/**
 * Class PrestadorServicoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class PrestadorServicoRepositoryEloquent extends BaseRepository implements PrestadorServicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PrestadorServico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

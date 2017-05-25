<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoPrestadorServicoRepository;
use SA\Models\TipoPrestadorServico;
use SA\Validators\TipoPrestadorServicoValidator;

/**
 * Class TipoPrestadorServicoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoPrestadorServicoRepositoryEloquent extends BaseRepository implements TipoPrestadorServicoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoPrestadorServico::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

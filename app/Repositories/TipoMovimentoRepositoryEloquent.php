<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoMovimentoRepository;
use SA\Models\TipoMovimento;
use SA\Validators\TipoMovimentoValidator;

/**
 * Class TipoMovimentoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoMovimentoRepositoryEloquent extends BaseRepository implements TipoMovimentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoMovimento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

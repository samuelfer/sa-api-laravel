<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\avaliacaoRepository;
use SA\Models\Avaliacao;
use SA\Validators\AvaliacaoValidator;

/**
 * Class AvaliacaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AvaliacaoRepositoryEloquent extends BaseRepository implements AvaliacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Avaliacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoPessoaRepository;
use SA\Models\TipoPessoa;
use SA\Validators\TipoPessoaValidator;

/**
 * Class TipoPessoaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoPessoaRepositoryEloquent extends BaseRepository implements TipoPessoaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoPessoa::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

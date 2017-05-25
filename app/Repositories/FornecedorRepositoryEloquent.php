<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\FornecedorRepository;
use SA\Models\Fornecedor;
use SA\Validators\FornecedorValidator;

/**
 * Class FornecedorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class FornecedorRepositoryEloquent extends BaseRepository implements FornecedorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Fornecedor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

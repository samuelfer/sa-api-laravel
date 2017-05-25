<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\DocumentoFuncionarioRepository;
use SA\Models\DocumentoFuncionario;
use SA\Validators\DocumentoFuncionarioValidator;

/**
 * Class DocumentoFuncionarioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class DocumentoFuncionarioRepositoryEloquent extends BaseRepository implements DocumentoFuncionarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentoFuncionario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

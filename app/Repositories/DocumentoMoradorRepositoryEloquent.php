<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\DocumentoMoradorRepository;
use SA\Models\DocumentoMorador;
use SA\Validators\DocumentoMoradorValidator;

/**
 * Class DocumentoMoradorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class DocumentoMoradorRepositoryEloquent extends BaseRepository implements DocumentoMoradorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentoMorador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

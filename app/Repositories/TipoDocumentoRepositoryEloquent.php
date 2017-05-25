<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\tipo_documentoRepository;
use SA\Models\TipoDocumento;
use SA\Validators\TipoDocumentoValidator;

/**
 * Class TipoDocumentoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoDocumentoRepositoryEloquent extends BaseRepository implements TipoDocumentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoDocumento::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

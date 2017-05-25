<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TipoUploadRepository;
use SA\Models\TipoUpload;
use SA\Validators\TipoUploadValidator;

/**
 * Class TipoUploadRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoUploadRepositoryEloquent extends BaseRepository implements TipoUploadRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoUpload::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

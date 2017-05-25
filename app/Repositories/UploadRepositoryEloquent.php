<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\UploadRepository;
use SA\Models\Upload;
use SA\Validators\UploadValidator;

/**
 * Class UploadRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class UploadRepositoryEloquent extends BaseRepository implements UploadRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Upload::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

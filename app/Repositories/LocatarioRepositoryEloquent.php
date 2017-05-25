<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\LocatarioRepository;
use SA\Models\Locatario;
use SA\Validators\LocatarioValidator;

/**
 * Class LocatarioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class LocatarioRepositoryEloquent extends BaseRepository implements LocatarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Locatario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\animalRepository;
use SA\Models\Animal;
use SA\Validators\AnimalValidator;

/**
 * Class AnimalRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AnimalRepositoryEloquent extends BaseRepository implements AnimalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Animal::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\anuncioRepository;
use SA\Models\Anuncio;
use SA\Validators\AnuncioValidator;

/**
 * Class AnuncioRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AnuncioRepositoryEloquent extends BaseRepository implements AnuncioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Anuncio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

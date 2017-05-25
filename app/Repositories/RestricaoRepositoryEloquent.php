<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\RestricaoRepository;
use SA\Models\Restricao;
use SA\Validators\RestricaoValidator;

/**
 * Class RestricaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class RestricaoRepositoryEloquent extends BaseRepository implements RestricaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Restricao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

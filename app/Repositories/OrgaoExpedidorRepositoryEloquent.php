<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\OrgaoExpedidorRepository;
use SA\Models\OrgaoExpedidor;
use SA\Validators\OrgaoExpedidorValidator;

/**
 * Class OrgaoExpedidorRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class OrgaoExpedidorRepositoryEloquent extends BaseRepository implements OrgaoExpedidorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrgaoExpedidor::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

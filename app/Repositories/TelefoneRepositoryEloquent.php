<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\TelefoneRepository;
use SA\Models\Telefone;
use SA\Validators\TelefoneValidator;

/**
 * Class TelefoneRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TelefoneRepositoryEloquent extends BaseRepository implements TelefoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Telefone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

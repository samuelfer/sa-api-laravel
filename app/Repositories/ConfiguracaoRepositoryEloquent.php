<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\ConfiguracaoRepository;
use SA\Models\Configuracao;
use SA\Validators\ConfiguracaoValidator;

/**
 * Class ConfiguracaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ConfiguracaoRepositoryEloquent extends BaseRepository implements ConfiguracaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Configuracao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Models\Pessoa;
use SA\Models\Condominio;


/**
 * Class PessoaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class PessoaRepositoryEloquent extends BaseRepository implements PessoaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pessoa::class;
    }


    //Pegando o condominio
    public function condominio()
    {
        return $this->model->belongsTo(Condominio::class, 'id_condominio', 'id_condominio')->select('id_condominio', 'no_condominio');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

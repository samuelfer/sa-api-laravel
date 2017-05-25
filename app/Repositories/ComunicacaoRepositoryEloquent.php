<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\ComunicacaoRepository;
use SA\Models\Comunicacao;
use SA\Validators\ComunicacaoValidator;

/**
 * Class ComunicacaoRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class ComunicacaoRepositoryEloquent extends BaseRepository implements ComunicacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comunicacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    //Pegar os comunicados de um imovel
    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'id_numero_imovel', 'id_numero_imovel');
    }
}

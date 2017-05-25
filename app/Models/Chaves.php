<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Chaves extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_bloco',
        'id_numero_imovel',
        'id_tipo_chave',
        'id_morador',
        'dt_hr_entrada_chaves',
        'dt_hr_saida_chaves',
        'de_observacao'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando o tipo de chave
    public function tipoChave()
    {
        return $this->hasOne(TipoChaves::class, 'id_tipo_chave', 'id_tipo_chave');
    }

}

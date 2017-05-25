<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AchadosPerdidos extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'de_local',
        'de_item',
        'dt_achados_perdidos',
        'img_item',
        'st_item',
        'id_bloco',
        'id_numero_imovel',
        'de_perdeu',
        'id_funcionario',
        'id_morador',
        'st_entregue',
        'id_morador',
        'dt_entrega',
        'hr_entrega',

    ];

    //Pegar o grupo do usuario logado
    public function imovel()
    {
        return $this->hasOne(Imovel::class, 'user_id', 'id');
    }

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Correspondencia extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_bloco',
        'id_numero_imovel',
        'de_remetente',
        'dt_hr_chegada',
        'dt_hr_entrega',
        'de_recebedor',
        'st_entregue',
        'de_observacao'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

}

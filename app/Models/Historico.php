<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Historico extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_pessoa',
        'id_tipo_pessoa',
        'id_bloco',
        'id_numero_imovel',
        'dt_entrada',
        'dt_inativacao',
    ];

}

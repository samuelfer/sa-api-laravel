<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ContaCorrente extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nu_conta',
        'nu_agencia',
        'id_banco',
        'id_condominio',
        'id_tipo_conta',
        'nu_valor'
    ];

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Movimento extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nu_conta',
        'nu_agencia',
        'id_fornecedor',
        'id_tipo_documento',
        'id_tipo_movimento',
        'dt_movimento',
        'nu_documento',
        'vl_movimento',
    ];

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Visitante extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_tipo_visitante',
        'img_visitante',
        'nu_rg',
        'nu_cpf'
    ];

}

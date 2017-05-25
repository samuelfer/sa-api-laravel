<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Perfil extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_pessoa',
        'id_tipo_perfil',
        'dt_inicio',
        'dt_fim',
        'st_status',
    ];

}

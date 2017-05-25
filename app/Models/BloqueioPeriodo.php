<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BloqueioPeriodo extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_bloco',
        'id_numero_imovel',
        'dt_inicio',
        'dt_fim',
        'de_observacao'
    ];

}

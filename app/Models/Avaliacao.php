<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Avaliacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nu_avaliacao',
        'id_prestador',
        'dt_avaliacao',
        'observacao'
    ];

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ConsumoGas extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_lancamento',
        'dt_leitura',
        'coeficiente',
        'vl_quilo',
        'vl_taxa',
        'mes_ano',
        'id_condominio'
    ];

}

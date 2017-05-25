<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LeituraGas extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_consumo',
        'id_numero_imovel',
        'id_bloco',
        'vl_leitura',
        'vl_consumo_kg',
        'vl_consumo',
        'vl_total',
        'dt_leitura'
    ];

}

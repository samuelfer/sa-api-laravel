<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Areceber extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nu_documento',
        'dt_pagamento',
        'dt_vencimento',
        'nu_juros',
        'vl_multa',
        'valor',
        'vl_total',
        'st_pago'
    ];

}

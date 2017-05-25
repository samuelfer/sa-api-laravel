<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MultaVeiculo extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_multa_notificacao',
        'dt_hr_trava',
        'dt_hr_destrava',
        'nu_placa'
    ];

}

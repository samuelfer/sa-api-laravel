<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Apagar extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_fornecedor',
        'id_tipo_documento',
        'dt_data',
        'nu_documento',
        'dt_vencimento',
        'nu_jurus',
        'nu_multa',
        'nu_valor',
        'nu_valor_pago',
        'deliquidado_sn',
    ];

}

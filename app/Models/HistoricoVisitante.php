<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class HistoricoVisitante extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_visitante',
        'id_bloco',
        'id_numero_imovel',
        'dt_hr_historico',
        'st_visita'
    ];

}

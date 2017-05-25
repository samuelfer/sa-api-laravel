<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AgendaCompromisso extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_cadastro',
        'dt_agenda',
        'st_notificacao',
        'de_responsavel',
        'de_titulo_tarefa',
        'de_tarefa',
        'st_status',
        'nu_qtde_dias',
        'de_acao',

    ];

}

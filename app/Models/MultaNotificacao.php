<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MultaNotificacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_condominio',
        'id_bloco',
        'id_numero_imovel',
        'id_pessoa',
        'id_tipo_multa_notificacao',
        'de_multa_notificacao',
        'dt_multa_notificacao',
        'vl_multa_notificacao',
        'de_vl_multa_notificacao',
        'st_liquidado',
        'de_observacao',
        'de_conduta'
    ];

}

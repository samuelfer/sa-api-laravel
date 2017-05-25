<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Reserva extends Model implements Transformable
{
    use TransformableTrait;
    //use BelongsToTenants;


    protected $fillable = [
        'id_bloco',
        'id_numero_imovel',
        'id_area_comum',
        'id_area_pai',
        'id_tipo_area',
        'dt_reserva',
        'hr_inicio',
        'hr_fim',
        'nu_valor',
        'status',
        'login',
        'st_termo',
        'dt_hr_solicitacao',
        'de_observacao'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando a area comum
    public function areaComum()
    {
        return $this->hasOne(AreaComum::class, 'id_area_comum', 'id_area_comum');
    }

    //Verificar se o imovel esta bloqueado
    public function bloqueioPeriodo()
    {
        $var = $this->hasOne(BloqueioPeriodo::class, 'id_numero_imovel', 'id_numero_imovel');
        //$var = $this->$var->hasOne(BloqueioPeriodo::class, 'id_bloco', 'id_bloco');
        return $var;
    }

}

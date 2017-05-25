<?php

namespace SA\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AreaComum extends Model implements Transformable
{
    use TransformableTrait;
    //use BelongsToTenants;

    protected $fillable = [
        'id_area_pai',
        'id_tipo_area',
        'de_cadastro_reserva_area_comum',
        'de_materiais',
        'nu_valor',
        'hr_inicio',
        'hr_fim',
        'tmp_duracao',
        'st_horario_sn',
        'ignora_qtd_reserva',
        'nu_antecedencia_max',
        'nu_antecedencia_min',
        'qtd_reserva_mes',
        'perm_varias_reserva_dia',
        'qtd_reserva_mes_gratis',
        'qtd_reserva_ano_gratis'
    ];


    public function areaPai()
    {
        return $this->hasOne(AreaPai::class,'id_area_pai', 'id_area_pai');
    }

    public function tipoArea()
    {
        return $this->hasOne(TipoArea::class,'id_tipo_area', 'id_tipo_area');
    }


}

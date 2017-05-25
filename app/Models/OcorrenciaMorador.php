<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OcorrenciaMorador extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_morador',
        'id_bloco',
        'id_numero_imovel',
        'id_tipo_ocorrencia',
        'dt_hr_ocorrencia',
        'de_ocorrencia',
        'img_ocorrencia',
        'nu_placa',
        'de_marca_modelo',
        'st_visto',
        'feedback',
        'id_ocorrencia_relacionada',
        'de_observacao'
    ];

}

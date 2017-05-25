<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OcorrenciaPorteiro extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_hr_ocorrencia',
        'de_ocorrencia',
        'login',
    ];

}

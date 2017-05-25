<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Anuncio extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_anuncio',
        'hr_anuncio',
        'de_categoria',
        'de_titulo_anuncio',
        'de_anuncio',
        'imagem',
        'nu_telefone',
        'vl_anuncio'
    ];

}

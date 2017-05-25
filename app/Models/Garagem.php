<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Garagem extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_numero_imovel',
        'id_bloco',
        'de_imagem'
    ];

}

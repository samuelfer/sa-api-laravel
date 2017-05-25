<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Fornecedor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_pessoa',
        'dt_cadastro',
        'de_razao_social'
    ];

}

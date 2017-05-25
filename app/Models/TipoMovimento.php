<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoMovimento extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'de_tipo_movimento'
    ];

}

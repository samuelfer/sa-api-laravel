<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Especie extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'de_especie'
    ];

    protected $hidden = ['created_at', 'updated_at', 'id'];

}

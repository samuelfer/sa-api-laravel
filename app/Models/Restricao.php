<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Restricao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_area_comum',
        'data'
    ];

}

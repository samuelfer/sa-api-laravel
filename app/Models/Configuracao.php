<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Configuracao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
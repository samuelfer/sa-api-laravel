<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Dependentes extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}

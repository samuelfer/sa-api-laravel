<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Banco extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'de_banco',
        'de_site'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}

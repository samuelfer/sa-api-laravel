<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class SegLog extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'inserted_date',
        'username',
        'application',
        'creator',
        'ip_user',
        'action',
        'description',
    ];

}

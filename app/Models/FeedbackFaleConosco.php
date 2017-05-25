<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FeedbackFaleConosco extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_fale_conosco',
        'de_mensagem',
        'login',
        'dt_mensagem'
    ];

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TipoPrestadorServico extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['de_tipo_servico'];

    protected $timestamp = false;

    protected $table = 'tipo_servicos';

    protected $hidden = ['created_at', 'updated_at', 'id'];

}

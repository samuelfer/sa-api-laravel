<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ModeloVeiculo extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'de_modelo',
        'id_fabricante'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    //Pegando o fabricante
    public function fabricante()
    {
        return $this->hasOne(Fabricante::class, 'id_fabricante', 'id_fabricante');
    }
}

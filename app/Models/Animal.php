<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Animal extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_raca',
        'id_especie',
        'img_animal',
        'id_numero_imovel',
        'id_bloco',
        'st_vacinado',
        'id_pessoa'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando a raca do animal
    public function raca()
    {
        return $this->hasOne(Raca::class, 'id_raca', 'id_raca');
    }

    //Pegando a especie do animal
    public function especie()
    {
        return $this->hasOne(Especie::class, 'id_especie', 'id_especie');
    }

}

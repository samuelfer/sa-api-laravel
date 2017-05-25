<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Visita extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_bloco',
        'id_numero_imovel',
        'dt_hr_visita'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

}

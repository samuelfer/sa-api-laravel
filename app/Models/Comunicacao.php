<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comunicacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_comunicacao',
        'de_texto',
        'id_bloco',
        'id_numero_imovel',
        'id_morador',
        'de_email',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    //Pegando os blocos
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando os moradores
    public function morador()
    {
        return $this->hasOne(Morador::class, 'id', 'id_morador');
    }

}

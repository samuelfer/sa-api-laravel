<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FaleConosco extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'dt_mensagem',
        'id_bloco',
        'id_numero_imovel',
        'id_tipo_fale_conosco',
        'email',
        'de_mensagem',
        'st_visto',
        'feedback',
        'telefone',
        'st_ticket',
        'dt_ultima_mensagem',
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando o tipo da mensagem
    public function tipoMensagem()
    {
        return $this->hasOne(TipoFaleConosco::class, 'id_tipo_fale_conosco', 'id_tipo_fale_conosco');
    }

}

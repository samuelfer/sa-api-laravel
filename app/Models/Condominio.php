<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Condominio extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'no_condominio',
        'img_logo',
        'nu_cnpj_cnpf',
        'email_condominio',
        'nu_cep_cond',
        'de_logradouro_cond',
        'de_complemento_cond',
        'nu_numero_cond',
        'de_bairro_cond',
        'de_cidade_cond',
        'de_uf_cond',
        'de_obs_cond',
        'endereco_site',
        'id_administradora'
    ];

//    protected $visible = ['img_logo', 'nu_cnpj_cnpf', 'email_condominio','de_logradouro_cond',
//        'de_complemento_cond',
//        'nu_numero_cond',
//        'de_bairro_cond',
//        'de_cidade_cond',
//        'de_uf_cond',
//        'de_obs_cond',
//        'endereco_site',
//        'id_administradora'];

}

<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use SA\Repositories\CondominioRepository;

class Pessoa extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_tipo_pessoa',
        'id_condominio',
        'dt_cadastro',
        'de_pessoa',
        'img_pessoa',
        'dt_nascimento',
        'nu_telefone',
        'nu_celular',
        'nu_cpf_cnpf',
        'de_email',
        'nu_rg',
        'nu_cep',
        'de_bairro',
        'de_cidade',
        'nu_logradouro',
        'de_logradouro',
        'de_complemento',
        'de_uf',
        'de_observacao'
    ];

    //Pegando o tipo de pessoa
    public function tipoPessoa()
    {
        return $this->hasOne(TipoPessoa::class, 'id_tipo_pessoa', 'id_tipo_pessoa');
    }

//    //Pegando o condominio
    public function condominio()
    {
        return $this->hasOne(Condominio::class, 'id_condominio', 'id_condominio')
            ->select('no_condominio');
    }

    //Pegando o condominio
//    public function condominio()
//    {
//        return $this->belongsTo(Condominio::class, 'id_condominio', 'id_condominio');
//    }
}

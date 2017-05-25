<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PrestadorServico extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_tipo_servico',
        'id_pessoa',
        'id_banco',
        'nu_agencia',
        'nu_conta',
        'id_tipo_conta',
        'nu_operacao',
        'media',
        'st_ativo',
        'permissao',
    ];

    //Pegando o bloco
    public function tipoServico()
    {
        return $this->hasOne(TipoPrestadorServico::class, 'id_tipo_servico', 'id_tipo_servico');
    }

    //Pegando o banco
    public function banco()
    {
        return $this->hasOne(Banco::class, 'id_banco', 'id_banco');
    }

    //Pegando o banco
    public function tipoConta()
    {
        return $this->hasOne(TipoConta::class, 'id_tipo_conta', 'id_tipo_conta');
    }

}

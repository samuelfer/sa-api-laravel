<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class VeiculoMorador extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nu_placa',
        'id_bloco',
        'id_numero_imovel',
        'id_pessoa',
        'id_modelo_veiculo',
        'de_vaga_veiculo',
        'de_cadastro_veiculo_cidade',
        'de_cadastro_veiculo_uf',
        'im_cadastro_veiculo_imagem',
        'de_linha',
        'dt_linha',
        'dt_fabricacao',
        'de_cor',
        'st_ativo',
        'dt_inativacao'
    ];

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Pegando o modelo
    public function modeloVeiculo()
    {
        return $this->hasOne(ModeloVeiculo::class, 'id_modelo_veiculo', 'id_modelo_veiculo');
    }

}

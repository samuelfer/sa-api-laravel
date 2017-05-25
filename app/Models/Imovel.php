<?php

namespace SA\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Imovel extends Model implements Transformable
{
    use TransformableTrait;
    //use BelongsToTenants;


    protected $fillable = [
        'created_at',
        'de_metragem_imovel',
        'de_observacao_imovel',
        'id',
        'id_bloco',
        'id_numero_imovel',
        'id_proprietario',
        'id_tipo_situacao',
        'updated_at',
        'usuario',
        //'nu_quartos_imovel',

    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $timestamp = false;

    //Pegando o bloco
    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id_bloco', 'id_bloco');
    }

    //Situacao do imovel
    public function tipoSituacao()
    {
        return $this->belongsTo(TipoSituacao::class, 'id_tipo_situacao', 'id_tipo_situacao');
    }

    //Pegar os comunicados de um imovel
    public function comunicado()
    {
        return $this->hasMany(Comunicacao::class, 'id_numero_imovel', 'id_numero_imovel');
    }

    //Pegar os faleconosco de um imovel
    public function faleConosco()
    {
        return $this->hasMany(FaleConosco::class, 'id_numero_imovel', 'id_numero_imovel');
    }

    //Pegar os faleconosco de um imovel
    public function correspondencia()
    {
        return $this->hasMany(Correspondencia::class, 'id_numero_imovel', 'id_numero_imovel');
    }

    //Pegar as ocorrencias de um imovel
    public function ocorrenciaMorador()
    {
        return $this->hasMany(OcorrenciaMorador::class, 'id_numero_imovel', 'id_numero_imovel');
    }

    //Pegar as ocorrencias de um imovel
    public function visita()
    {
        return $this->hasMany(Visita::class, 'id_numero_imovel', 'id_numero_imovel');
    }

//    public function teste($id)
//    {
//        $teste = DB::table('comunicacaos')->select('id_comunicacao', 'dt_comunicacao')->where('id_numero_imovel', $id AND 'id_bloco', '1')->get();
//        dd($teste);
//    }

}

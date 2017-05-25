<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Upload extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_tipo_upload',
        'dt_upload',
        'arquivo',
        'de_descricao',
        'permissao'
    ];

    //Pegando o tipo de documento
    public function tipoUpload()
    {
        return $this->hasOne(TipoUpload::class, 'id_tipo_upload', 'id_tipo_upload');
    }

}

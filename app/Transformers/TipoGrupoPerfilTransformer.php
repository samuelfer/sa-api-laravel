<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoGrupoPerfil;

/**
 * Class TipoGrupoPerfilTransformer
 * @package namespace SA\Transformers;
 */
class TipoGrupoPerfilTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoGrupoPerfil entity
     * @param \TipoGrupoPerfil $model
     *
     * @return array
     */
    public function transform(TipoGrupoPerfil $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

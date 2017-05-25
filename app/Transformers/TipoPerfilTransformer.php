<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoPerfil;

/**
 * Class TipoPerfilTransformer
 * @package namespace SA\Transformers;
 */
class TipoPerfilTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoPerfil entity
     * @param \TipoPerfil $model
     *
     * @return array
     */
    public function transform(TipoPerfil $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

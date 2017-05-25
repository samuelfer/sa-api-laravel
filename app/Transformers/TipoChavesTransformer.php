<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoChaves;

/**
 * Class TipoChavesTransformer
 * @package namespace SA\Transformers;
 */
class TipoChavesTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoChaves entity
     * @param \TipoChaves $model
     *
     * @return array
     */
    public function transform(TipoChaves $model)
    {
        return [
            'id'         => (int) $model->id,
            'id_tipo_chave'         => (int) $model->id_tipo_chave,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

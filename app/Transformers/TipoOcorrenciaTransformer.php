<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoOcorrencia;

/**
 * Class TipoOcorrenciaTransformer
 * @package namespace SA\Transformers;
 */
class TipoOcorrenciaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoOcorrencia entity
     * @param \TipoOcorrencia $model
     *
     * @return array
     */
    public function transform(TipoOcorrencia $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

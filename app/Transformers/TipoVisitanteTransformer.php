<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoVisitante;

/**
 * Class TipoVisitanteTransformer
 * @package namespace SA\Transformers;
 */
class TipoVisitanteTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoVisitante entity
     * @param \TipoVisitante $model
     *
     * @return array
     */
    public function transform(TipoVisitante $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

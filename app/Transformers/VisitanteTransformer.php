<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Visitante;

/**
 * Class VisitanteTransformer
 * @package namespace SA\Transformers;
 */
class VisitanteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Visitante entity
     * @param \Visitante $model
     *
     * @return array
     */
    public function transform(Visitante $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

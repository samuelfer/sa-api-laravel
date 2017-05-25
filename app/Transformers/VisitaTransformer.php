<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Visita;

/**
 * Class VisitaTransformer
 * @package namespace SA\Transformers;
 */
class VisitaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Visita entity
     * @param \Visita $model
     *
     * @return array
     */
    public function transform(Visita $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

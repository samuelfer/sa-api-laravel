<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\HistoricoVisitante;

/**
 * Class HistoricoVisitanteTransformer
 * @package namespace SA\Transformers;
 */
class HistoricoVisitanteTransformer extends TransformerAbstract
{

    /**
     * Transform the \HistoricoVisitante entity
     * @param \HistoricoVisitante $model
     *
     * @return array
     */
    public function transform(HistoricoVisitante $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

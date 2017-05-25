<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\AchadosPerdidos;

/**
 * Class AchadosPerdidosTransformer
 * @package namespace SA\Transformers;
 */
class AchadosPerdidosTransformer extends TransformerAbstract
{

    /**
     * Transform the \AchadosPerdidos entity
     * @param \AchadosPerdidos $model
     *
     * @return array
     */
    public function transform(AchadosPerdidos $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

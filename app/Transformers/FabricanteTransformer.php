<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Fabricante;

/**
 * Class FabricanteTransformer
 * @package namespace SA\Transformers;
 */
class FabricanteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Fabricante entity
     * @param \Fabricante $model
     *
     * @return array
     */
    public function transform(Fabricante $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

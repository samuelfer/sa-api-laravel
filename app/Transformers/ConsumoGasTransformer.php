<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\ConsumoGas;

/**
 * Class ConsumoGasTransformer
 * @package namespace SA\Transformers;
 */
class ConsumoGasTransformer extends TransformerAbstract
{

    /**
     * Transform the \ConsumoGas entity
     * @param \ConsumoGas $model
     *
     * @return array
     */
    public function transform(ConsumoGas $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\LeituraGas;

/**
 * Class LeituraGasTransformer
 * @package namespace SA\Transformers;
 */
class LeituraGasTransformer extends TransformerAbstract
{

    /**
     * Transform the \LeituraGas entity
     * @param \LeituraGas $model
     *
     * @return array
     */
    public function transform(LeituraGas $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

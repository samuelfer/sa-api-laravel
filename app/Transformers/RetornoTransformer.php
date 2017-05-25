<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Retorno;

/**
 * Class RetornoTransformer
 * @package namespace SA\Transformers;
 */
class RetornoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Retorno entity
     * @param \Retorno $model
     *
     * @return array
     */
    public function transform(Retorno $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

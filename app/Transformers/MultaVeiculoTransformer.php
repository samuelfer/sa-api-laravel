<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\MultaVeiculo;

/**
 * Class MultaVeiculoTransformer
 * @package namespace SA\Transformers;
 */
class MultaVeiculoTransformer extends TransformerAbstract
{

    /**
     * Transform the \MultaVeiculo entity
     * @param \MultaVeiculo $model
     *
     * @return array
     */
    public function transform(MultaVeiculo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

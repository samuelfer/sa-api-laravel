<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\ModeloVeiculo;

/**
 * Class ModeloVeiculoTransformer
 * @package namespace SA\Transformers;
 */
class ModeloVeiculoTransformer extends TransformerAbstract
{

    /**
     * Transform the \ModeloVeiculo entity
     * @param \ModeloVeiculo $model
     *
     * @return array
     */
    public function transform(ModeloVeiculo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

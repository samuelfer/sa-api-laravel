<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\VeiculoMorador;

/**
 * Class VeiculoMoradorTransformer
 * @package namespace SA\Transformers;
 */
class VeiculoMoradorTransformer extends TransformerAbstract
{

    /**
     * Transform the \VeiculoMorador entity
     * @param \VeiculoMorador $model
     *
     * @return array
     */
    public function transform(VeiculoMorador $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

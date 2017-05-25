<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Dependentes;

/**
 * Class DependentesTransformer
 * @package namespace SA\Transformers;
 */
class DependentesTransformer extends TransformerAbstract
{

    /**
     * Transform the \Dependentes entity
     * @param \Dependentes $model
     *
     * @return array
     */
    public function transform(Dependentes $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

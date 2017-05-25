<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Especie;

/**
 * Class EspecieTransformer
 * @package namespace SA\Transformers;
 */
class EspecieTransformer extends TransformerAbstract
{

    /**
     * Transform the \Especie entity
     * @param \Especie $model
     *
     * @return array
     */
    public function transform(Especie $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

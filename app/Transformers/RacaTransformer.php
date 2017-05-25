<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Raca;

/**
 * Class RacaTransformer
 * @package namespace SA\Transformers;
 */
class RacaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Raca entity
     * @param \Raca $model
     *
     * @return array
     */
    public function transform(Raca $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

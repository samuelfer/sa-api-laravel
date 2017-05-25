<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Apagar;

/**
 * Class ApagarTransformer
 * @package namespace SA\Transformers;
 */
class ApagarTransformer extends TransformerAbstract
{

    /**
     * Transform the \Apagar entity
     * @param \Apagar $model
     *
     * @return array
     */
    public function transform(Apagar $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

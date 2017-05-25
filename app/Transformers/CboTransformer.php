<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Cbo;

/**
 * Class CboTransformer
 * @package namespace SA\Transformers;
 */
class CboTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cbo entity
     * @param \Cbo $model
     *
     * @return array
     */
    public function transform(Cbo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

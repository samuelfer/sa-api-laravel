<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Morador;

/**
 * Class MoradorTransformer
 * @package namespace SA\Transformers;
 */
class MoradorTransformer extends TransformerAbstract
{

    /**
     * Transform the \Morador entity
     * @param \Morador $model
     *
     * @return array
     */
    public function transform(Morador $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

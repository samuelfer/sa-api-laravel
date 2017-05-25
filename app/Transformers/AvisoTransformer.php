<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Aviso;

/**
 * Class AvisoTransformer
 * @package namespace SA\Transformers;
 */
class AvisoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Aviso entity
     * @param \Aviso $model
     *
     * @return array
     */
    public function transform(Aviso $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

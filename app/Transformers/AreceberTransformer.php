<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Areceber;

/**
 * Class AreceberTransformer
 * @package namespace SA\Transformers;
 */
class AreceberTransformer extends TransformerAbstract
{

    /**
     * Transform the \Areceber entity
     * @param \Areceber $model
     *
     * @return array
     */
    public function transform(Areceber $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

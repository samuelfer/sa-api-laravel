<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Termo;

/**
 * Class TermoTransformer
 * @package namespace SA\Transformers;
 */
class TermoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Termo entity
     * @param \Termo $model
     *
     * @return array
     */
    public function transform(Termo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

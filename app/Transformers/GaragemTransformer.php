<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Garagem;

/**
 * Class GaragemTransformer
 * @package namespace SA\Transformers;
 */
class GaragemTransformer extends TransformerAbstract
{

    /**
     * Transform the \Garagem entity
     * @param \Garagem $model
     *
     * @return array
     */
    public function transform(Garagem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

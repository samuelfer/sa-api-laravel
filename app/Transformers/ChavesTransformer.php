<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Chaves;

/**
 * Class ChavesTransformer
 * @package namespace SA\Transformers;
 */
class ChavesTransformer extends TransformerAbstract
{

    /**
     * Transform the \Chaves entity
     * @param \Chaves $model
     *
     * @return array
     */
    public function transform(Chaves $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

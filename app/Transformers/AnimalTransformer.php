<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Animal;

/**
 * Class AnimalTransformer
 * @package namespace SA\Transformers;
 */
class AnimalTransformer extends TransformerAbstract
{

    /**
     * Transform the \Animal entity
     * @param \Animal $model
     *
     * @return array
     */
    public function transform(Animal $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

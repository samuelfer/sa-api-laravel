<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Locatario;

/**
 * Class LocatarioTransformer
 * @package namespace SA\Transformers;
 */
class LocatarioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Locatario entity
     * @param \Locatario $model
     *
     * @return array
     */
    public function transform(Locatario $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

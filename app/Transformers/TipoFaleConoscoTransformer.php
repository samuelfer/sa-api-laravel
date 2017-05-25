<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoFaleConosco;

/**
 * Class TipoFaleConoscoTransformer
 * @package namespace SA\Transformers;
 */
class TipoFaleConoscoTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoFaleConosco entity
     * @param \TipoFaleConosco $model
     *
     * @return array
     */
    public function transform(TipoFaleConosco $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoDependente;

/**
 * Class TipoDependenteTransformer
 * @package namespace SA\Transformers;
 */
class TipoDependenteTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoDependente entity
     * @param \TipoDependente $model
     *
     * @return array
     */
    public function transform(TipoDependente $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

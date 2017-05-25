<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\ContaCorrente;

/**
 * Class ContaCorrenteTransformer
 * @package namespace SA\Transformers;
 */
class ContaCorrenteTransformer extends TransformerAbstract
{

    /**
     * Transform the \ContaCorrente entity
     * @param \ContaCorrente $model
     *
     * @return array
     */
    public function transform(ContaCorrente $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

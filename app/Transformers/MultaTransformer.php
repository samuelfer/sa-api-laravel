<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Multa;

/**
 * Class MultaTransformer
 * @package namespace SA\Transformers;
 */
class MultaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Multa entity
     * @param \Multa $model
     *
     * @return array
     */
    public function transform(Multa $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

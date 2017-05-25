<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Movimento;

/**
 * Class MovimentoTransformer
 * @package namespace SA\Transformers;
 */
class MovimentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Movimento entity
     * @param \Movimento $model
     *
     * @return array
     */
    public function transform(Movimento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

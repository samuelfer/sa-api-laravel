<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Restricao;

/**
 * Class RestricaoTransformer
 * @package namespace SA\Transformers;
 */
class RestricaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Restricao entity
     * @param \Restricao $model
     *
     * @return array
     */
    public function transform(Restricao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

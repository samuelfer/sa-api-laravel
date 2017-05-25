<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Avaliacao;

/**
 * Class AvaliacaoTransformer
 * @package namespace SA\Transformers;
 */
class AvaliacaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Avaliacao entity
     * @param \Avaliacao $model
     *
     * @return array
     */
    public function transform(Avaliacao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Historico;

/**
 * Class HistoricoTransformer
 * @package namespace SA\Transformers;
 */
class HistoricoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Historico entity
     * @param \Historico $model
     *
     * @return array
     */
    public function transform(Historico $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

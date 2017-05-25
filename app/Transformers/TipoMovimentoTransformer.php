<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoMovimento;

/**
 * Class TipoMovimentoTransformer
 * @package namespace SA\Transformers;
 */
class TipoMovimentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoMovimento entity
     * @param \TipoMovimento $model
     *
     * @return array
     */
    public function transform(TipoMovimento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

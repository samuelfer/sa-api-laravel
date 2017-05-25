<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoConta;

/**
 * Class TipoContaTransformer
 * @package namespace SA\Transformers;
 */
class TipoContaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoConta entity
     * @param \TipoConta $model
     *
     * @return array
     */
    public function transform(TipoConta $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

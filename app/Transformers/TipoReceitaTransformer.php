<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoReceita;

/**
 * Class TipoReceitaTransformer
 * @package namespace SA\Transformers;
 */
class TipoReceitaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoReceita entity
     * @param \TipoReceita $model
     *
     * @return array
     */
    public function transform(TipoReceita $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

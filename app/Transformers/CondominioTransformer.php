<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Condominio;

/**
 * Class CondominioTransformer
 * @package namespace SA\Transformers;
 */
class CondominioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Condominio entity
     * @param \Condominio $model
     *
     * @return array
     */
    public function transform(Condominio $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

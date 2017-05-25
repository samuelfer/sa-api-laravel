<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Anuncio;

/**
 * Class AnuncioTransformer
 * @package namespace SA\Transformers;
 */
class AnuncioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Anuncio entity
     * @param \Anuncio $model
     *
     * @return array
     */
    public function transform(Anuncio $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

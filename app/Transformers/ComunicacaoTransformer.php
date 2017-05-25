<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Comunicacao;

/**
 * Class ComunicacaoTransformer
 * @package namespace SA\Transformers;
 */
class ComunicacaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Comunicacao entity
     * @param \Comunicacao $model
     *
     * @return array
     */
    public function transform(Comunicacao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

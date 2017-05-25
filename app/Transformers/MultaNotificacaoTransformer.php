<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\MultaNotificacao;

/**
 * Class MultaNotificacaoTransformer
 * @package namespace SA\Transformers;
 */
class MultaNotificacaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \MultaNotificacao entity
     * @param \MultaNotificacao $model
     *
     * @return array
     */
    public function transform(MultaNotificacao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

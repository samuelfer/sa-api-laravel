<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Configuracao;

/**
 * Class ConfiguracaoTransformer
 * @package namespace SA\Transformers;
 */
class ConfiguracaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Configuracao entity
     * @param \Configuracao $model
     *
     * @return array
     */
    public function transform(Configuracao $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

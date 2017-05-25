<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\PrestadorServico;

/**
 * Class PrestadorServicoTransformer
 * @package namespace SA\Transformers;
 */
class PrestadorServicoTransformer extends TransformerAbstract
{

    /**
     * Transform the \PrestadorServico entity
     * @param \PrestadorServico $model
     *
     * @return array
     */
    public function transform(PrestadorServico $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoPrestadorServico;

/**
 * Class TipoPrestadorServicoTransformer
 * @package namespace SA\Transformers;
 */
class TipoPrestadorServicoTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoPrestadorServico entity
     * @param \TipoPrestadorServico $model
     *
     * @return array
     */
    public function transform(TipoPrestadorServico $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

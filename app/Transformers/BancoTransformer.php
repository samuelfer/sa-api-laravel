<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Banco;

/**
 * Class BancoTransformer
 * @package namespace SA\Transformers;
 */
class BancoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Banco entity
     * @param \Banco $model
     *
     * @return array
     */
    public function transform(Banco $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

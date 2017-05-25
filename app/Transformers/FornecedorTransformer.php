<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Fornecedor;

/**
 * Class FornecedorTransformer
 * @package namespace SA\Transformers;
 */
class FornecedorTransformer extends TransformerAbstract
{

    /**
     * Transform the \Fornecedor entity
     * @param \Fornecedor $model
     *
     * @return array
     */
    public function transform(Fornecedor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoPessoa;

/**
 * Class TipoPessoaTransformer
 * @package namespace SA\Transformers;
 */
class TipoPessoaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoPessoa entity
     * @param \TipoPessoa $model
     *
     * @return array
     */
    public function transform(TipoPessoa $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

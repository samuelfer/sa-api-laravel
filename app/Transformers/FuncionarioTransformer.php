<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Funcionario;

/**
 * Class FuncionarioTransformer
 * @package namespace SA\Transformers;
 */
class FuncionarioTransformer extends TransformerAbstract
{

    /**
     * Transform the \Funcionario entity
     * @param \Funcionario $model
     *
     * @return array
     */
    public function transform(Funcionario $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

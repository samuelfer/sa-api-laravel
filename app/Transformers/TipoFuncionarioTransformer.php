<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoFuncionario;

/**
 * Class TipoFuncionarioTransformer
 * @package namespace SA\Transformers;
 */
class TipoFuncionarioTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoFuncionario entity
     * @param \TipoFuncionario $model
     *
     * @return array
     */
    public function transform(TipoFuncionario $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

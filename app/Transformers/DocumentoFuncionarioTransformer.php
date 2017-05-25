<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\DocumentoFuncionario;

/**
 * Class DocumentoFuncionarioTransformer
 * @package namespace SA\Transformers;
 */
class DocumentoFuncionarioTransformer extends TransformerAbstract
{

    /**
     * Transform the \DocumentoFuncionario entity
     * @param \DocumentoFuncionario $model
     *
     * @return array
     */
    public function transform(DocumentoFuncionario $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

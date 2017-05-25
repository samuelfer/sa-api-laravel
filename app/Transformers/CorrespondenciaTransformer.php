<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Correspondencia;

/**
 * Class CorrespondenciaTransformer
 * @package namespace SA\Transformers;
 */
class CorrespondenciaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Correspondencia entity
     * @param \Correspondencia $model
     *
     * @return array
     */
    public function transform(Correspondencia $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\OcorrenciaMorador;

/**
 * Class OcorrenciaMoradorTransformer
 * @package namespace SA\Transformers;
 */
class OcorrenciaMoradorTransformer extends TransformerAbstract
{

    /**
     * Transform the \OcorrenciaMorador entity
     * @param \OcorrenciaMorador $model
     *
     * @return array
     */
    public function transform(OcorrenciaMorador $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

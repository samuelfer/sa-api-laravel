<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\OcorrenciaPorteiro;

/**
 * Class OcorrenciaPorteiroTransformer
 * @package namespace SA\Transformers;
 */
class OcorrenciaPorteiroTransformer extends TransformerAbstract
{

    /**
     * Transform the \OcorrenciaPorteiro entity
     * @param \OcorrenciaPorteiro $model
     *
     * @return array
     */
    public function transform(OcorrenciaPorteiro $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

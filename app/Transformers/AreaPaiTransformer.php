<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\AreaPai;

/**
 * Class AreaPaiTransformer
 * @package namespace SA\Transformers;
 */
class AreaPaiTransformer extends TransformerAbstract
{

    /**
     * Transform the \AreaPai entity
     * @param \AreaPai $model
     *
     * @return array
     */
    public function transform(AreaPai $model)
    {
        return [
            'id'         => (int) $model->id,
            'id_area_pai'         => (int) $model->id_area_pai,
            'de_area_pai'         => (int) $model->de_area_pai,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

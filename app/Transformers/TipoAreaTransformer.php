<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoArea;

/**
 * Class TipoAreaTransformer
 * @package namespace SA\Transformers;
 */
class TipoAreaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoArea entity
     * @param \TipoArea $model
     *
     * @return array
     */
    public function transform(TipoArea $model)
    {
        return [
            'id'         => (int) $model->id,
            'de_tipo_area'         => (int) $model->de_tipo_area,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

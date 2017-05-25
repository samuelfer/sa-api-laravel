<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoUpload;

/**
 * Class TipoUploadTransformer
 * @package namespace SA\Transformers;
 */
class TipoUploadTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoUpload entity
     * @param \TipoUpload $model
     *
     * @return array
     */
    public function transform(TipoUpload $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

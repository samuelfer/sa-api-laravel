<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Upload;

/**
 * Class UploadTransformer
 * @package namespace SA\Transformers;
 */
class UploadTransformer extends TransformerAbstract
{

    /**
     * Transform the \Upload entity
     * @param \Upload $model
     *
     * @return array
     */
    public function transform(Upload $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

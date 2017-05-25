<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoDocumento;

/**
 * Class TipoDocumentoTransformer
 * @package namespace SA\Transformers;
 */
class TipoDocumentoTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoDocumento entity
     * @param \TipoDocumento $model
     *
     * @return array
     */
    public function transform(TipoDocumento $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

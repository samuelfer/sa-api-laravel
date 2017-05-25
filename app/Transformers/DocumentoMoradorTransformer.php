<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\DocumentoMorador;

/**
 * Class DocumentoMoradorTransformer
 * @package namespace SA\Transformers;
 */
class DocumentoMoradorTransformer extends TransformerAbstract
{

    /**
     * Transform the \DocumentoMorador entity
     * @param \DocumentoMorador $model
     *
     * @return array
     */
    public function transform(DocumentoMorador $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

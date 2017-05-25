<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Bloco;

/**
 * Class BlocoTransformer
 * @package namespace SA\Transformers;
 */
class BlocoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Bloco entity
     * @param \Bloco $model
     *
     * @return array
     */
    public function transform(Bloco $model)
    {
        return [
            'id'         => (int) $model->id,
            'id_bloco'         => (int) $model->id_bloco,
            'de_bloco'   => $model->de_bloco,
            /* place your other model properties here */

            //'created_at' => $model->created_at,
            //'updated_at' => $model->updated_at
        ];
    }
}

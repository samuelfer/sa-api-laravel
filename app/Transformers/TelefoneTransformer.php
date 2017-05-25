<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Telefone;

/**
 * Class TelefoneTransformer
 * @package namespace SA\Transformers;
 */
class TelefoneTransformer extends TransformerAbstract
{

    /**
     * Transform the \Telefone entity
     * @param \Telefone $model
     *
     * @return array
     */
    public function transform(Telefone $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

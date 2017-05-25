<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Perfil;

/**
 * Class PerfilTransformer
 * @package namespace SA\Transformers;
 */
class PerfilTransformer extends TransformerAbstract
{

    /**
     * Transform the \Perfil entity
     * @param \Perfil $model
     *
     * @return array
     */
    public function transform(Perfil $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

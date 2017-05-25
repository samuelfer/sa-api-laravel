<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoAgenda;

/**
 * Class TipoAgendaTransformer
 * @package namespace SA\Transformers;
 */
class TipoAgendaTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoAgenda entity
     * @param \TipoAgenda $model
     *
     * @return array
     */
    public function transform(TipoAgenda $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

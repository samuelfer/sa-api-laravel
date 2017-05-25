<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\AgendaCompromisso;

/**
 * Class AgendaCompromissoTransformer
 * @package namespace SA\Transformers;
 */
class AgendaCompromissoTransformer extends TransformerAbstract
{

    /**
     * Transform the \AgendaCompromisso entity
     * @param \AgendaCompromisso $model
     *
     * @return array
     */
    public function transform(AgendaCompromisso $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

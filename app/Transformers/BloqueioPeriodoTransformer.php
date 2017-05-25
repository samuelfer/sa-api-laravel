<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\BloqueioPeriodo;

/**
 * Class BloqueioPeriodoTransformer
 * @package namespace SA\Transformers;
 */
class BloqueioPeriodoTransformer extends TransformerAbstract
{

    /**
     * Transform the \BloqueioPeriodo entity
     * @param \BloqueioPeriodo $model
     *
     * @return array
     */
    public function transform(BloqueioPeriodo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

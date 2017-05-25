<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\FeedbackFaleConosco;

/**
 * Class FeedbackFaleConoscoTransformer
 * @package namespace SA\Transformers;
 */
class FeedbackFaleConoscoTransformer extends TransformerAbstract
{

    /**
     * Transform the \FeedbackFaleConosco entity
     * @param \FeedbackFaleConosco $model
     *
     * @return array
     */
    public function transform(FeedbackFaleConosco $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

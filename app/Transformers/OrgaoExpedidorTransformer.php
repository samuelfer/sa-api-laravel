<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\OrgaoExpedidor;

/**
 * Class OrgaoExpedidorTransformer
 * @package namespace SA\Transformers;
 */
class OrgaoExpedidorTransformer extends TransformerAbstract
{

    /**
     * Transform the \OrgaoExpedidor entity
     * @param \OrgaoExpedidor $model
     *
     * @return array
     */
    public function transform(OrgaoExpedidor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

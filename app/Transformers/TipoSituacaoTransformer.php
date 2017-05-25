<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\TipoSituacao;

/**
 * Class TipoSituacaoTransformer
 * @package namespace SA\Transformers;
 */
class TipoSituacaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \TipoSituacao entity
     * @param \TipoSituacao $model
     *
     * @return array
     */
    public function transform(TipoSituacao $model)
    {
        return [
            'id_tipo_situacao'         => (int) $model->id_tipo_situacao,
            'de_tipo_situacao'         => $model->de_tipo_situacao,

            /* place your other model properties here */

            //'created_at' => $model->created_at,
            //'updated_at' => $model->updated_at
        ];
    }
}

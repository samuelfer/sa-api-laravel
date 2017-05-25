<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Imovel;

/**
 * Class ImovelTransformer
 * @package namespace SA\Transformers;
 */
class ImovelTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['bloco'];

    /**
     * Transform the \Imovel entity
     * @param \Imovel $model
     *
     * @return array
     */
    public function transform(Imovel $model)
    {
        return [
            'id'         => (int) $model->id,
            'id_numero_imovel' => $model->id_numero_imovel,
            'id_bloco' => $model->id_bloco,
            'id_tipo_situacao' => $model->id_tipo_situacao,
            'de_metragem_imovel' => $model->de_metragem_imovel,
            'de_observacao_imovel' => $model->de_observacao_imovel,
            'id_proprietario' => $model->id_proprietario,
            'usuario' => $model->usuario,
            //'de_bloco' => $model->de_bloco,
            /* place your other model properties here */

            //'created_at' => $model->created_at,
            //'updated_at' => $model->updated_at
        ];
    }

    public function includeBloco(Imovel $model)
    {
        return $this->item($model->bloco, new BlocoTransformer());
    }
}

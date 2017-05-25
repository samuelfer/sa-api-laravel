<?php

namespace SA\Presenters;

use SA\Transformers\OrgaoExpedidorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrgaoExpedidorPresenter
 *
 * @package namespace SA\Presenters;
 */
class OrgaoExpedidorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrgaoExpedidorTransformer();
    }
}

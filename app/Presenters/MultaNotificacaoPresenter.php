<?php

namespace SA\Presenters;

use SA\Transformers\MultaNotificacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MultaNotificacaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class MultaNotificacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MultaNotificacaoTransformer();
    }
}

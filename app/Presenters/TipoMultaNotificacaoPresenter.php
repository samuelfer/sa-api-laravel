<?php

namespace SA\Presenters;

use SA\Transformers\TipoMultaNotificacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoMultaNotificacaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoMultaNotificacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoMultaNotificacaoTransformer();
    }
}

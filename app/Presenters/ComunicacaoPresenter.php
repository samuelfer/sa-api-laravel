<?php

namespace SA\Presenters;

use SA\Transformers\ComunicacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComunicacaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class ComunicacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComunicacaoTransformer();
    }
}

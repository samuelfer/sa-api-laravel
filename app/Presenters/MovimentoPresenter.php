<?php

namespace SA\Presenters;

use SA\Transformers\MovimentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MovimentoPresenter
 *
 * @package namespace SA\Presenters;
 */
class MovimentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MovimentoTransformer();
    }
}

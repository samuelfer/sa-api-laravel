<?php

namespace SA\Presenters;

use SA\Transformers\RetornoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RetornoPresenter
 *
 * @package namespace SA\Presenters;
 */
class RetornoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RetornoTransformer();
    }
}

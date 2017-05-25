<?php

namespace SA\Presenters;

use SA\Transformers\ApagarTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ApagarPresenter
 *
 * @package namespace SA\Presenters;
 */
class ApagarPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ApagarTransformer();
    }
}

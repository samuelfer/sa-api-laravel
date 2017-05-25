<?php

namespace SA\Presenters;

use SA\Transformers\AvisoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AvisoPresenter
 *
 * @package namespace SA\Presenters;
 */
class AvisoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AvisoTransformer();
    }
}

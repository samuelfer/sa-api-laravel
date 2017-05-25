<?php

namespace SA\Presenters;

use SA\Transformers\FabricanteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FabricantePresenter
 *
 * @package namespace SA\Presenters;
 */
class FabricantePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FabricanteTransformer();
    }
}

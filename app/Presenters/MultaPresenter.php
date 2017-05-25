<?php

namespace SA\Presenters;

use SA\Transformers\MultaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MultaPresenter
 *
 * @package namespace SA\Presenters;
 */
class MultaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MultaTransformer();
    }
}

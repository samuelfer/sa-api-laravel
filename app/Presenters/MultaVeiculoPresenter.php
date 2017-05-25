<?php

namespace SA\Presenters;

use SA\Transformers\MultaVeiculoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MultaVeiculoPresenter
 *
 * @package namespace SA\Presenters;
 */
class MultaVeiculoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MultaVeiculoTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\RacaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RacaPresenter
 *
 * @package namespace SA\Presenters;
 */
class RacaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RacaTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\AreceberTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AreceberPresenter
 *
 * @package namespace SA\Presenters;
 */
class AreceberPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AreceberTransformer();
    }
}

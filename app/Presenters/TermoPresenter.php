<?php

namespace SA\Presenters;

use SA\Transformers\TermoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TermoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TermoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TermoTransformer();
    }
}

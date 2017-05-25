<?php

namespace SA\Presenters;

use SA\Transformers\AnuncioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AnuncioPresenter
 *
 * @package namespace SA\Presenters;
 */
class AnuncioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AnuncioTransformer();
    }
}

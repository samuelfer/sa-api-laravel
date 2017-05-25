<?php

namespace SA\Presenters;

use SA\Transformers\ChavesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ChavesPresenter
 *
 * @package namespace SA\Presenters;
 */
class ChavesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ChavesTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\MoradorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MoradorPresenter
 *
 * @package namespace SA\Presenters;
 */
class MoradorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MoradorTransformer();
    }
}

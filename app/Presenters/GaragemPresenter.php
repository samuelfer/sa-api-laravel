<?php

namespace SA\Presenters;

use SA\Transformers\GaragemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GaragemPresenter
 *
 * @package namespace SA\Presenters;
 */
class GaragemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GaragemTransformer();
    }
}

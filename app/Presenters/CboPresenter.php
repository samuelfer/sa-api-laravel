<?php

namespace SA\Presenters;

use SA\Transformers\CboTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CboPresenter
 *
 * @package namespace SA\Presenters;
 */
class CboPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CboTransformer();
    }
}

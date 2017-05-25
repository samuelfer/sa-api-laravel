<?php

namespace SA\Presenters;

use SA\Transformers\CondominioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CondominioPresenter
 *
 * @package namespace SA\Presenters;
 */
class CondominioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CondominioTransformer();
    }
}

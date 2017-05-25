<?php

namespace SA\Presenters;

use SA\Transformers\VisitanteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VisitantePresenter
 *
 * @package namespace SA\Presenters;
 */
class VisitantePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VisitanteTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\VisitaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VisitaPresenter
 *
 * @package namespace SA\Presenters;
 */
class VisitaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VisitaTransformer();
    }
}

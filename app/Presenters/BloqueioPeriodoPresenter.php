<?php

namespace SA\Presenters;

use SA\Transformers\BloqueioPeriodoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BloqueioPeriodoPresenter
 *
 * @package namespace SA\Presenters;
 */
class BloqueioPeriodoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BloqueioPeriodoTransformer();
    }
}

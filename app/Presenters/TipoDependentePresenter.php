<?php

namespace SA\Presenters;

use SA\Transformers\TipoDependenteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoDependentePresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoDependentePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoDependenteTransformer();
    }
}

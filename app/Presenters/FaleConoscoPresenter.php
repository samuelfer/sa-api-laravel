<?php

namespace SA\Presenters;

use SA\Transformers\FaleConoscoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FaleConoscoPresenter
 *
 * @package namespace SA\Presenters;
 */
class FaleConoscoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FaleConoscoTransformer();
    }
}

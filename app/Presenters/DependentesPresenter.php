<?php

namespace SA\Presenters;

use SA\Transformers\DependentesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DependentesPresenter
 *
 * @package namespace SA\Presenters;
 */
class DependentesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DependentesTransformer();
    }
}

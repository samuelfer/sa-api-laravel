<?php

namespace SA\Presenters;

use SA\Transformers\EspecieTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EspeciePresenter
 *
 * @package namespace SA\Presenters;
 */
class EspeciePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EspecieTransformer();
    }
}

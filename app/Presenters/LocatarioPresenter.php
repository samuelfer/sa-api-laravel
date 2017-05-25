<?php

namespace SA\Presenters;

use SA\Transformers\LocatarioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocatarioPresenter
 *
 * @package namespace SA\Presenters;
 */
class LocatarioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocatarioTransformer();
    }
}

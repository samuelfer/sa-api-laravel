<?php

namespace SA\Presenters;

use SA\Transformers\AnimalTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AnimalPresenter
 *
 * @package namespace SA\Presenters;
 */
class AnimalPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AnimalTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\PerfilTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PerfilPresenter
 *
 * @package namespace SA\Presenters;
 */
class PerfilPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PerfilTransformer();
    }
}

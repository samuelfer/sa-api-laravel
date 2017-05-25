<?php

namespace SA\Presenters;

use SA\Transformers\TipoContaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoContaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoContaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoContaTransformer();
    }
}

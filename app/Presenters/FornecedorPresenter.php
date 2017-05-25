<?php

namespace SA\Presenters;

use SA\Transformers\FornecedorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FornecedorPresenter
 *
 * @package namespace SA\Presenters;
 */
class FornecedorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FornecedorTransformer();
    }
}

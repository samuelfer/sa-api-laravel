<?php

namespace SA\Presenters;

use SA\Transformers\FuncionarioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FuncionarioPresenter
 *
 * @package namespace SA\Presenters;
 */
class FuncionarioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FuncionarioTransformer();
    }
}

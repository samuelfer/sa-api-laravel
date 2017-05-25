<?php

namespace SA\Presenters;

use SA\Transformers\TipoFuncionarioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoFuncionarioPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoFuncionarioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoFuncionarioTransformer();
    }
}

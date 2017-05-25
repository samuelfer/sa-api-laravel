<?php

namespace SA\Presenters;

use SA\Transformers\TipoMovimentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoMovimentoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoMovimentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoMovimentoTransformer();
    }
}

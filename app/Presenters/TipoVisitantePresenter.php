<?php

namespace SA\Presenters;

use SA\Transformers\TipoVisitanteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoVisitantePresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoVisitantePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoVisitanteTransformer();
    }
}

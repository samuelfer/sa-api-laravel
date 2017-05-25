<?php

namespace SA\Presenters;

use SA\Transformers\HistoricoVisitanteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HistoricoVisitantePresenter
 *
 * @package namespace SA\Presenters;
 */
class HistoricoVisitantePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HistoricoVisitanteTransformer();
    }
}

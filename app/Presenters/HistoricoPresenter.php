<?php

namespace SA\Presenters;

use SA\Transformers\HistoricoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HistoricoPresenter
 *
 * @package namespace SA\Presenters;
 */
class HistoricoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HistoricoTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\AgendaCompromissoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AgendaCompromissoPresenter
 *
 * @package namespace SA\Presenters;
 */
class AgendaCompromissoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AgendaCompromissoTransformer();
    }
}

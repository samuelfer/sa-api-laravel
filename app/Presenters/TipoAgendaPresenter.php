<?php

namespace SA\Presenters;

use SA\Transformers\TipoAgendaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoAgendaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoAgendaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoAgendaTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\AchadosPerdidosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AchadosPerdidosPresenter
 *
 * @package namespace SA\Presenters;
 */
class AchadosPerdidosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AchadosPerdidosTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\TipoOcorrenciaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoOcorrenciaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoOcorrenciaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoOcorrenciaTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\OcorrenciaPorteiroTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OcorrenciaPorteiroPresenter
 *
 * @package namespace SA\Presenters;
 */
class OcorrenciaPorteiroPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OcorrenciaPorteiroTransformer();
    }
}

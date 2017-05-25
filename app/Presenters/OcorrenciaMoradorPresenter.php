<?php

namespace SA\Presenters;

use SA\Transformers\OcorrenciaMoradorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OcorrenciaMoradorPresenter
 *
 * @package namespace SA\Presenters;
 */
class OcorrenciaMoradorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OcorrenciaMoradorTransformer();
    }
}

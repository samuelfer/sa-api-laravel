<?php

namespace SA\Presenters;

use SA\Transformers\CorrespondenciaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CorrespondenciaPresenter
 *
 * @package namespace SA\Presenters;
 */
class CorrespondenciaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CorrespondenciaTransformer();
    }
}

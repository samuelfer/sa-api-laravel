<?php

namespace SA\Presenters;

use SA\Transformers\TipoChavesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoChavesPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoChavesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoChavesTransformer();
    }
}

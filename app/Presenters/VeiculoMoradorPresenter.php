<?php

namespace SA\Presenters;

use SA\Transformers\VeiculoMoradorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VeiculoMoradorPresenter
 *
 * @package namespace SA\Presenters;
 */
class VeiculoMoradorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VeiculoMoradorTransformer();
    }
}

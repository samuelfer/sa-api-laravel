<?php

namespace SA\Presenters;

use SA\Transformers\ModeloVeiculoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ModeloVeiculoPresenter
 *
 * @package namespace SA\Presenters;
 */
class ModeloVeiculoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ModeloVeiculoTransformer();
    }
}

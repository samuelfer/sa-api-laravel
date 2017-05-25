<?php

namespace SA\Presenters;

use SA\Transformers\ConsumoGasTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsumoGasPresenter
 *
 * @package namespace SA\Presenters;
 */
class ConsumoGasPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsumoGasTransformer();
    }
}

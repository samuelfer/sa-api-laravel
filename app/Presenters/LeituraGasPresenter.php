<?php

namespace SA\Presenters;

use SA\Transformers\LeituraGasTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LeituraGasPresenter
 *
 * @package namespace SA\Presenters;
 */
class LeituraGasPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LeituraGasTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\BancoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BancoPresenter
 *
 * @package namespace SA\Presenters;
 */
class BancoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BancoTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\BlocoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlocoPresenter
 *
 * @package namespace SA\Presenters;
 */
class BlocoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlocoTransformer();
    }
}

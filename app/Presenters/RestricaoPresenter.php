<?php

namespace SA\Presenters;

use SA\Transformers\RestricaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RestricaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class RestricaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RestricaoTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\AvaliacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AvaliacaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class AvaliacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AvaliacaoTransformer();
    }
}

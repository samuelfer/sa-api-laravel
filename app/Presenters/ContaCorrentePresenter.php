<?php

namespace SA\Presenters;

use SA\Transformers\ContaCorrenteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContaCorrentePresenter
 *
 * @package namespace SA\Presenters;
 */
class ContaCorrentePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContaCorrenteTransformer();
    }
}

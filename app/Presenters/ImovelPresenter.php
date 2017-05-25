<?php

namespace SA\Presenters;

use SA\Transformers\ImovelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ImovelPresenter
 *
 * @package namespace SA\Presenters;
 */
class ImovelPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ImovelTransformer();
    }
}

<?php

namespace SA\Presenters;

use SA\Transformers\TipoFaleConoscoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoFaleConoscoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoFaleConoscoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoFaleConoscoTransformer();
    }
}

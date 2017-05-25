<?php

namespace SA\Presenters;

use SA\Transformers\TipoPerfilTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoPerfilPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoPerfilPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoPerfilTransformer();
    }
}

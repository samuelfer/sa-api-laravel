<?php

namespace SA\Presenters;

use SA\Transformers\TipoReceitaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoReceitaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoReceitaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoReceitaTransformer();
    }
}

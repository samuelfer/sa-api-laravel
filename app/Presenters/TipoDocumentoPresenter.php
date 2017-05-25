<?php

namespace SA\Presenters;

use SA\Transformers\TipoDocumentoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoDocumentoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoDocumentoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoDocumentoTransformer();
    }
}

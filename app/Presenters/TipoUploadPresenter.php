<?php

namespace SA\Presenters;

use SA\Transformers\TipoUploadTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoUploadPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoUploadPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoUploadTransformer();
    }
}

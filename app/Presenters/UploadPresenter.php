<?php

namespace SA\Presenters;

use SA\Transformers\UploadTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UploadPresenter
 *
 * @package namespace SA\Presenters;
 */
class UploadPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UploadTransformer();
    }
}

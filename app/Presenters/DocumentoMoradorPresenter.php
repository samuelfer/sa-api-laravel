<?php

namespace SA\Presenters;

use SA\Transformers\DocumentoMoradorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DocumentoMoradorPresenter
 *
 * @package namespace SA\Presenters;
 */
class DocumentoMoradorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DocumentoMoradorTransformer();
    }
}

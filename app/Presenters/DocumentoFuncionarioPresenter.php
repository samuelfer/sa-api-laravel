<?php

namespace SA\Presenters;

use SA\Transformers\DocumentoFuncionarioTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DocumentoFuncionarioPresenter
 *
 * @package namespace SA\Presenters;
 */
class DocumentoFuncionarioPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DocumentoFuncionarioTransformer();
    }
}

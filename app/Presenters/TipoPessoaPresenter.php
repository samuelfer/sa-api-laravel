<?php

namespace SA\Presenters;

use SA\Transformers\TipoPessoaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoPessoaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoPessoaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoPessoaTransformer();
    }
}

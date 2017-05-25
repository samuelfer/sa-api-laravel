<?php

namespace SA\Presenters;

use SA\Transformers\PessoaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PessoaPresenter
 *
 * @package namespace SA\Presenters;
 */
class PessoaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PessoaTransformer();
    }
}

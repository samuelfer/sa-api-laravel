<?php

namespace SA\Presenters;

use SA\Transformers\ConfiguracaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfiguracaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class ConfiguracaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConfiguracaoTransformer();
    }
}

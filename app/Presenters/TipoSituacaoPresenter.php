<?php

namespace SA\Presenters;

use SA\Transformers\TipoSituacaoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoSituacaoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoSituacaoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoSituacaoTransformer();
    }

}

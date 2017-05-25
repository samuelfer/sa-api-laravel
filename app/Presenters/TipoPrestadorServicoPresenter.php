<?php

namespace SA\Presenters;

use SA\Transformers\TipoPrestadorServicoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoPrestadorServicoPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoPrestadorServicoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoPrestadorServicoTransformer();
    }
}

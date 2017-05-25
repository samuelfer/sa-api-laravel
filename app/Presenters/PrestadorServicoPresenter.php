<?php

namespace SA\Presenters;

use SA\Transformers\PrestadorServicoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PrestadorServicoPresenter
 *
 * @package namespace SA\Presenters;
 */
class PrestadorServicoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PrestadorServicoTransformer();
    }
}

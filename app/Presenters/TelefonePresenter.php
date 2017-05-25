<?php

namespace SA\Presenters;

use SA\Transformers\TelefoneTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TelefonePresenter
 *
 * @package namespace SA\Presenters;
 */
class TelefonePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TelefoneTransformer();
    }
}

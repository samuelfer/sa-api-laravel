<?php

namespace SA\Presenters;

use SA\Transformers\FeedbackFaleConoscoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FeedbackFaleConoscoPresenter
 *
 * @package namespace SA\Presenters;
 */
class FeedbackFaleConoscoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FeedbackFaleConoscoTransformer();
    }
}

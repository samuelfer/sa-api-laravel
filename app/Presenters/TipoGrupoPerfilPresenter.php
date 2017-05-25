<?php

namespace SA\Presenters;

use SA\Transformers\TipoGrupoPerfilTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoGrupoPerfilPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoGrupoPerfilPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoGrupoPerfilTransformer();
    }
}

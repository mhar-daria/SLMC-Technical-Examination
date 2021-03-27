<?php

namespace App\Presenters;

use App\Transformers\PhotoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PhotoPresenter.
 *
 * @package namespace App\Presenters;
 */
class PhotoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PhotoTransformer();
    }
}

<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Use to find what get method
     * paginate or all
     *
     * @return string
     */
    public function resultParser() {
        return request()->get('getAll') ? 'all' : 'paginate';
    }
}

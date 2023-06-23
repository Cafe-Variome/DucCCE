<?php

namespace App\Libraries;

use App\Libraries\Formgen_core;
use CodeIgniter\HTTP\RequestInterface;

class Formgen extends Formgen_core
{
    function __construct($params, RequestInterface $request)
    {
        parent::__construct($params, $request);
    }

    // function form()
    // {
    //     return $this->parent_form();
    // }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Libraries\CIAuth;
use SSP;
use Carbon\Carbon;

class CoberturaController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions', 'text'];
    protected $db;

    public function index()
    {
        $data['title'] = 'Cobertura - Multi Beland S.A.C.';
        
        return view('frontend/pages/cobertura', $data);
    }
}
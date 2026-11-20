<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TapiceriaIndustrialController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.php';
        $this->db = db_connect();
    }

    public function index()
    {
        $data['title'] = 'Tapiceria Industrial - Multi Beland S.A.C.';
        $data['description'] = 'Servicios especializados en pintura industrial para maquinaria pesada y equipos mineros';
        
        return view('frontend/pages/servicios/tapiceria-industrial', $data);
    }
}
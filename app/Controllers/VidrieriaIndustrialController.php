<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VidrieriaIndustrialController extends BaseController
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
        $data['title'] = 'Vidrieria Industrial - Multi Beland S.A.C.';
        $data['description'] = 'Servicios especializados en Vidrieria industrial para maquinaria pesada y equipos mineros';
        
        return view('frontend/pages/servicios/vidrieria-industrial', $data);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RestauracionCabinasController extends BaseController
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
        $data['title'] = 'Restauración de Cabinas - Multi Beland S.A.C.';
        $data['description'] = 'Servicios especializados en restauración de cabinas para maquinaria pesada y equipos mineros';        
        return view('frontend/pages/servicios/restauracion-cabinas', $data);
    }
}
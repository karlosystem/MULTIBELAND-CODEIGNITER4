<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contactenos;
use App\Libraries\Hash;
use App\Libraries\CIAuth;
use SSP;
use Carbon\Carbon;

class ContactenosController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions', 'text'];
    protected $db;

    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.php';
        $this->db = db_connect();
    }

    public function index()
    {
        $data = array(
            'pageTitle' => 'Contactenos'
        );
        return view('backend/pages/contactenos', $data);
    }

    public function getContactenos()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
        $table = "contactenos";
        $primaryKey = "id";
        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "name",
                "dt" => 1
            ),
            array(
                "db" => "email",
                "dt" => 2
            ),
            array(
                "db" => "phone",
                "dt" => 3              
            ),
            array(
                "db" => "description",
                "dt" => 4,
            ),
            array(
                "db" => "created_at",
                "dt" => 5                            
            )
        );
        return json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }
}

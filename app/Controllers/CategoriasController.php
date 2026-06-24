<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categorias;
use App\Models\SubCategory;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Libraries\Hash;
use App\Libraries\CIAuth;
use SSP;

class CategoriasController extends BaseController
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
        $data = array(
            'pageTitle' => 'Categorias'
        );
        return view('backend/pages/categories', $data);
    }

    public function addCategory()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $this->validate([
                'category_name' => [
                    'rules' => 'required|is_unique[categories.name]',
                    'errors' => [
                        'required' => 'El nombre de la categoria es obligatorio',
                        'is_unique' => 'El nombre de la categoria ya existe, escriba otro',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                //return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(),'msg'=>"form validado..."]);
                $category = new Categorias();
                $save = $category->save(['name' => $request->getVar('category_name')]);

                if ($save) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Categoria ha sido agregado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }

    public function getCategories()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
        $table = "categories";
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
                "db" => "name",
                "dt" => 2,
                "formatter" => function ($d, $row) {
                    $subcategory = new SubCategory();
                    $subcategories = $subcategory->where(['parent_cat' => $row['id']])->findAll();
                    return count($subcategories);
                }
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    return "<div>
                        <button class='btn btn-sm btn-success p-2  mx-1 editCategoryBtn' data-id='" . $row['id'] . "'><small>Editar</small></button>
                        <button class='btn btn-sm btn-warning p-2  mx-1 deleteCategoryBtn' data-id='" . $row['id'] . "'><small>Eliminar</small></button>

                    </div>";
                }
            ),
            array(
                "db" => "ordering",
                "dt" => 4,
            ),
        );
        return json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function getCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('category_id');
            $category = new Categorias();
            $category_data = $category->find($id);
            return $this->response->setJSON(['data' => $category_data]);
        }
    }

    public function updateCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('category_id');
            $validation = \Config\Services::validation();

            $this->validate([
                'category_name' => [
                    'rules' => 'required|is_unique[categories.name, id, ' . $id . ']',
                    'errors' => [
                        'required' => 'El nombre de la categoria es obligatorio',
                        'is_unique' => 'El nombre de la categoria ya existe, escriba otro',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                $category = new Categorias();
                $update = $category->where('id', $id)->set(['name' => $request->getVar('category_name')])->update();
                if ($update) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Categoria ha sido actualizado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }

    public function deleteCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('category_id');
            $category = new Categorias();
            $subcategory = new SubCategory();
            $subcategories = $subcategory->where('parent_cat', $id)->findAll();
            if ($subcategories) {
                $msg = count($subcategories) == 1 ? 'Hay : (' . count($subcategories) . ') subcategorias relacionadas con la categoria principal, no se puede eliminar' : 'hay (' . count($subcategories) . ') subcategorias relacionadas a esta categoria';
                return $this->response->setJSON(['status' => 0, 'msg' => $msg]);
            } else {
                $delete = $category->where('id', $id)->delete();
                if ($delete) {
                    return $this->response->setJSON(['status' => 1, 'msg' => "Su Categoria ha sido eliminado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }

    public function reorderCategories()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $positions = $request->getVar('positions');
            $category = new Categorias();
            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                $category->where('id', $index)->set(['ordering' => $newPosition])->update();
            }
            return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Categoria ha sido ordenado con exito"]);
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categorias;
use App\Models\SubCategory;
use App\Models\Posts;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Libraries\Hash;
use App\Libraries\CIAuth;
use SSP;
use SawaStacks\CodeIgniter\Slugify;

class SubCategoriasController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.php';
        $this->db = db_connect();
    }

    public function getParentCategories()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('parent_category_id');
            $options = '<option value="0">Sin Categoria</option>';
            $category = new Categorias();
            $parent_categories = $category->findAll();

            if (count($parent_categories)) {
                $added_options = '';
                foreach ($parent_categories as $parent_category) {
                    $isSelect = $parent_category['id'] == $id ? 'selected' : '';
                    $added_options .= '<option value="' . $parent_category['id'] . '" ' . $isSelect . '>' . $parent_category['name'] . '</option>';
                }
                $options = $options . $added_options;
                return $this->response->setJSON(['status' => 1, 'data' => $options]);
            } else {
                return $this->response->setJSON(['status' => 1, 'data' => $options]);
            }
        }
    }

    public function addSubCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $this->validate([
                'subcategory_name' => [
                    'rules' => 'required|is_unique[sub_categories.name]',
                    'errors' => [
                        'required' => 'El nombre de la sub categoria es obligatorio',
                        'is_unique' => 'El nombre de la sub categoria ya existe, escriba otro',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                $subcategory = new SubCategory();
                $subcategory_name = $request->getVar('subcategory_name');
                $subcategory_description = $request->getVar('subcategory_description');
                $subcategory_parent_category = $request->getVar('parent_cat');
                $subcategory_slug = Slugify::model(SubCategory::class)->make($subcategory_name);

                $save = $subcategory->save([
                    'name' => $subcategory_name,
                    'parent_cat' => $subcategory_parent_category,
                    'slug' => $subcategory_slug,
                    'description' => $subcategory_description,
                ]);


                if ($save) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Sub Categoria ha sido agregado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }

    public function getSubCategories()
    {
        $category = new Categorias();
        $subcategory = new SubCategory();

        //detalles del host
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
        $table = "sub_categories";
        $primaryKey = "id";
        $columns = array(
            array(
                "db" => "id",
                "dt" => 0
            ),
            array(
                "db" => "name",
                "dt" => 1
            ),
            array(
                "db" => "id",
                "dt" => 2,
                "formatter" => function ($d, $row) use ($category, $subcategory) {
                    $parent_cat_id = $subcategory->asObject()->where("id", $row['id'])->first()->parent_cat;
                    $parent_cat_name = ' - ';
                    if ($parent_cat_id != 0) {
                        $parent_cat_name = $category->asObject()->where('id', $parent_cat_id)->first()->name;
                    }
                    return $parent_cat_name;
                }
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                  $post = new Posts();
                  $posts = $post->where(['category_id'=>$row['id']])->findAll();
                  return count($posts); 
                }
            ),
            array(
                "db" => "id",
                "dt" => 4,
                "formatter" => function ($d, $row) {
                    return "<div>
                    <button class='btn btn-sm btn-success p-2 mx-1 editSubCategoryBtn' data-id='" . $row['id'] . "'><small>Editar</small></button>
                    <button class='btn btn-sm btn-warning p-2 mx-1 deleteSubCategoryBtn' data-id='" . $row['id'] . "'><small>Eliminar</small></button>
                        </div>";
                }
            ),
            array(
                "db" => "ordering",
                "dt" => 5
            ),
        );
        return json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function getSubCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('subcategory_id');
            $subcategory = new SubCategory();
            $subcategory_data = $subcategory->find($id);
            return $this->response->setJSON(['data' => $subcategory_data]);
        }
    }

    public function updateSubCategory()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $id = $request->getVar('subcategory_id');
            $validation = \Config\Services::validation();

            $this->validate([
                'subcategory_name' => [
                    'rules' => 'required|is_unique[sub_categories.name, id, ' . $id . ']',
                    'errors' => [
                        'required' => 'El nombre de la sub categoria es obligatorio',
                        'is_unique' => 'El nombre de la sub categoria ya existe, escriba otro',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                $subcategory = new SubCategory();
                $subcategory_name = $request->getVar('subcategory_name');
                $subcategory_slug = Slugify::model(SubCategory::class)->make($subcategory_name);

                $data = array(
                    'name' => $request->getVar('subcategory_name'),
                    'parent_cat' => $request->getVar('parent_cat'),
                    'slug' => $subcategory_slug,
                    'description' => $request->getVar('description')
                );
                $save = $subcategory->update($id, $data);
                if ($save) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'SubCategoria ha sido actualizado']);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }

    public function reorderSubCategories()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $positions = $request->getVar('positions');
            $subcategory = new SubCategory();

            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                $subcategory->where('id', $index)->set(['ordering' => $newPosition])->update();
            }
            return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "La SubCategoria ha sido ordenado con exito"]);
        }
    }

    public function deleteSubCategory(){
        $request = \Config\Services::request();
        if($request->isAJAX()){
            $id = $request->getVar('subcategory_id');
            $subcategory = new SubCategory();
         
            $post = new Posts();
            $posts = $post->where('category_id', $id)->findAll();
            $msg = '';
            if ($posts) {
                $msg = count($posts) == 1 ? 'Hay : ('.count($posts).') mensajes relacionadas con la categoria principal, no se puede eliminar' : 'hay ('.count($posts).') mensajes relacionadas a esta subcategoria';  
                return $this->response->setJSON(['status'=>0, 'msg'=>$msg]);
            }else{
                $delete = $subcategory->delete($id);
                if ($delete) {
                    return $this->response->setJSON(['status'=>1,'msg'=>"La SubCategoria ha sido eliminado con exito"]);
                } else {
                    return $this->response->setJSON(['status'=>0, 'msg'=>'Ha ocurrido un error']);
                }
            } 

        }
    }
}

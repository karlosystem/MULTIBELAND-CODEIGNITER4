<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Banners;
use App\Models\Categorias;
use App\Models\SubCategory;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Libraries\Hash;
use App\Libraries\CIAuth;
use SSP;

class BannersController extends BaseController
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
            'pageTitle' => 'Banners'
        );
        return view('backend/pages/banners', $data);
    }

    public function addBanner()
    {
        $data = [
            'pageTitle' => 'Agregar Nuevo Banner',
        ];
        return view('backend/pages/new-banner', $data);
    }

    public function createBanner()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El nombre del banner es obligatorio',
                    ]
                ],
                'description' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'La descripcion del banner es obligatorio',
                    ]
                ],
                'link' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El link del banner es obligatorio',
                    ]
                ],
                'featured_image' => [
                    'rules' => 'uploaded[featured_image]|is_image[featured_image]|max_size[featured_image, 2048]',
                    'errors' => [
                        'uploaded' => 'La Imagen es obligatorio',
                        'is_image' => 'Debe de seleccionar un archivo tipo imagen',
                        'max_size' => 'La imagen no debe de exceder los 2mb',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                $user_id = CIAuth::id();
                $path = 'images/banners/';
                $file = $request->getFile('featured_image');
                $filename = 'beland_' . time() . $file->getClientName();
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                if ($file->move($path, $filename)) {
                    $banner = new Banners();
                    $data = array(
                        'author_id' => $user_id,
                        'name' => $request->getVar('name'),
                        'link' => $request->getVar('link'),
                        'image' => $filename,
                        'description' => $request->getVar('description')
                    );
                    $save = $banner->insert($data);
                    $last_id = $banner->getInsertID();
                    if ($save) {
                        return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Banner ha sido agregado con exito"]);
                    } else {
                        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                    }
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error para subir la imagen']);
                }
                return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "form validado..."]);
            }
        }
    }

    public function getBanners()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
        $table = "banners";
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
                "db" => "description",
                "dt" => 2
            ),
            array(
                "db" => "name",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    $banner = new Banners();
                    $image = $banner->asObject()->find($row['id'])->image;
                    return "<img src='/images/banners/$image' class='img-thumbnail' style='max-width:170px' />";
                }
            ),
            array(
                "db" => "ordering",
                "dt" => 4,
            ),
            array(
                "db" => "id",
                "dt" => 5,
                "formatter" => function ($d, $row) {
                    return "<div>
                        <a href='" . route_to('edit-banner', $row['id']) . "' class='btn btn-sm btn-success p-2 mx-1' data-id='" . $row['id'] . "'>Editar</a>
                        <button class='btn btn-sm btn-warning p-2  mx-1 deleteBannerBtn' data-id='" . $row['id'] . "'><small>Eliminar</small></button>
                    </div>";
                }
            )
        );
        return json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function deleteBanner()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $path = 'images/banner/';
            $banner_id = $request->getVar('banner_id');
            $banner = new Banners();
            $bannerInfo = $banner->asObject()->find($banner_id);
            $banner_featured_image = $bannerInfo->image;

            if ($banner_featured_image != null && file_exists($path . $banner_featured_image)) {
                unlink($path . $banner_featured_image);
            }

            $delete = $banner->delete($banner_id);
            if ($delete) {
                return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "El Banner ha sido eliminado con exito"]);
            } else {
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
            }
        }
    }

    public function editBanner($id)
    {
        $banner = new Banners();
        $data = [
            'pageTitle' => 'Editar Banner',
            'banner' => $banner->asObject()->find($id)
        ];
        return view('backend/pages/edit-banner', $data);
    }

    public function updateBanner()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $banner_id = $request->getVar('banner_id');
            $user_id = CIAuth::id();
            $banner = new Banners();
            if (isset($_FILES['featured_image']['name']) && !empty($_FILES['featured_image']['name'])) {
                $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El nombre del banner es obligatorio',
                        ]
                    ],
                    'description' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'La descripcion del banner es obligatorio',
                        ]
                    ],
                    'link' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El link del banner es obligatorio',
                        ]
                    ],
                    'featured_image' => [
                        'rules' => 'uploaded[featured_image]|is_image[featured_image]|max_size[featured_image, 2048]',
                        'errors' => [
                            'uploaded' => 'La Imagen es obligatorio',
                            'is_image' => 'Debe de seleccionar un archivo tipo imagen',
                            'max_size' => 'La imagen no debe de exceder los 2mb',
                        ]
                    ],
                ]);
            } else {
                $this->validate([
                    'name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El nombre del banner es obligatorio',
                        ]
                    ],
                    'description' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'La descripcion del banner es obligatorio',
                        ]
                    ],
                    'link' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'El link del banner es obligatorio',
                        ]
                    ]
                ]);
            }
            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                if (isset($_FILES['featured_image']['name']) && !empty($_FILES['featured_image']['name'])) {
                    $path = 'images/banners/';
                    $file = $request->getFile('featured_image');
                    $filename = 'beland_' . time() . $file->getClientName();
                    $old_post_featured_image = $banner->asObject()->find($banner_id)->image;
                    if ($file->move($path, $filename)) {
                        if ($old_post_featured_image != null && file_exists($path . $old_post_featured_image)) {
                            unlink($path . $old_post_featured_image);
                        }
                        $data = array(
                            'author_id' => $user_id,
                            'name' => $request->getVar('name'),
                            'link' => $request->getVar('link'),
                            'image' => $filename,
                            'description' => $request->getVar('description')
                        );
                        $update = $banner->update($banner_id, $data);
                        if ($update) {
                            return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Banner ha sido actualizado con exito']);
                        } else {
                            return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                        }
                    } else {
                        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Error subiendo la imagen']);
                    }
                } else {
                    $data = array(
                        'author_id' => $user_id,
                        'name' => $request->getVar('name'),
                        'link' => $request->getVar('link'),
                        'description' => $request->getVar('description')
                    );
                    $update = $banner->update($banner_id, $data);
                     if ($update) {
                        return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Banner ha sido actualizado con exito']);
                    } else {
                        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                    }
                }
            }
        }
    }

    public function reorderBanners()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $positions = $request->getVar('positions');
            $banner = new Banners();
            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                $banner->where('id', $index)->set(['ordering' => $newPosition])->update();
            }
            return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Banner ha sido ordenado con exito"]);
        }
    }

}

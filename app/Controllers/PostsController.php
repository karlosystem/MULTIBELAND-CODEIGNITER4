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
use App\Models\Posts;
use SawaStacks\CodeIgniter\Slugify;
use Carbon\Carbon;

class PostsController extends BaseController
{

    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.php';
        $this->db = db_connect();
    }

    public function addPost()
    {
        $subcategory = new SubCategory();
        $data = [
            'pageTitle' => 'Agregar Nuevo Mensaje',
            'categories' => $subcategory->asObject()->findAll()
        ];
        return view('backend/pages/new-post', $data);
    }

    public function createPost()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $this->validate([
                'title' => [
                    'rules' => 'required|is_unique[posts.title]',
                    'errors' => [
                        'required' => 'El nombre del Mensaje es obligatorio',
                        'is_unique' => 'El nombre del Mensaje ya existe, escriba otro',
                    ]
                ],
                'content' => [
                    'rules' => 'required|min_length[20]',
                    'errors' => [
                        'required' => 'El contenido del Mensaje es obligatorio',
                        'min_length' => 'El contenido tiene que tener al menos 20 caracteres',
                    ]
                ],
                'category' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'La Categoria del Mensaje es obligatorio',
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
                $path = 'images/posts/';
                $file = $request->getFile('featured_image');
                $filename = 'beland_'.time().$file->getClientName();
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                if ($file->move($path, $filename)) {
                    $post = new Posts();
                    $title = $request->getVar('title');
                    $title_slug = Slugify::model(Posts::class)->make($title);
                    $data = array(
                        'author_id' => $user_id,
                        'category_id' => $request->getVar('category'),
                        'title' => $request->getVar('title'),
                        'leyenda' => $request->getVar('leyenda'),
                        'slug' => $title_slug,
                        'content' => $request->getVar('content'),
                        'featured_image' => $filename,
                        'tags' => $request->getVar('tags'),
                        'meta_title' => $request->getVar('meta_title'),
                        'meta_keywords' => $request->getVar('meta_keywords'),
                        'meta_description' => $request->getVar('meta_description'),
                        'visibility' => $request->getVar('visibility'),
                    );
                    $save = $post->insert($data);
                    $last_id = $post->getInsertID();
                    if ($save) {
                        return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Mensaje ha sido agregado con exito"]);
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

    public function allPosts()
    {
        $data = [
            'pageTitle' => 'Todos los Mensajes'
        ];
        return view('backend/pages/all-posts', $data);
    }

    public function getPost()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
        $table = "posts";
        $primaryKey = "id";
        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "id",
                "dt" => 1,
                "formatter" => function ($d, $row) {
                    $post = new Posts();
                    $image = $post->asObject()->find($row['id'])->featured_image;
                    return "<img src='/images/posts/$image' class='img-thumbnail' style='max-width:70px' />";
                }
            ),
            array(
                "db" => "title",
                "dt" => 2
            ),
            array(
                "db" => "id",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    $post = new Posts();
                    $category_id = $post->asObject()->find($row["id"])->category_id;
                    $subcategory = new SubCategory();
                    $category_name = $subcategory->asObject()->find($category_id)->name;
                    return $category_name;
                }
            ),
            array(
                "db" => "id",
                "dt" => 4,
                "formatter" => function ($d, $row) {
                    $post = new Posts();
                    $visibility = $post->asObject()->find($row["id"])->visibility;
                    return $visibility == 1 ? 'Public' : 'Private';
                }
            ),
            array(
                "db" => "id",
                "dt" => 5,
                "formatter" => function ($d, $row) {
                    return "<div>                        
                        <a href='" . route_to('edit-post', $row['id']) . "' class='btn btn-sm btn-success p-2 mx-1' data-id='" . $row['id'] . "'>Editar</a>
                        <button class='btn btn-sm btn-danger p-2 mx-1 deletePostBtn' data-id='" . $row['id'] . "'>Eliminar</button>
                    </div>";
                }
            ),
        );
        return json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function editPost($id)
    {
        $subcategory = new SubCategory();
        $post = new Posts();
        $data = [
            'pageTitle' => 'Editar Mensaje',
            'categories' => $subcategory->asObject()->findAll(),
            'post' => $post->asObject()->find($id)
        ];
        return view('backend/pages/edit-post', $data);
    }

    public function updatePost()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $post_id = $request->getVar('post_id');
            $user_id = CIAuth::id();
            $post = new Posts();
            if (isset($_FILES['featured_image']['name']) && !empty($_FILES['featured_image']['name'])) {
                $this->validate([
                    'title' => [
                        'rules' => 'required|is_unique[posts.title,id,' . $post_id . ']',
                        'errors' => [
                            'required' => 'Titulo del Mensaje es Requerido',
                            'is_unique' => 'Este titulo de Mensaje ya existe'
                        ]
                    ],
                    'content' => [
                        'rules' => 'required|min_length[20]',
                        'errors' => [
                            'required' => 'Contenido del Mensaje es Requerido',
                            'min_length' => 'El contenido del mensaje debe de contener al menos 20 caracteres'
                        ]
                    ],
                    'featured_image' => [
                        'rules' => 'uploaded[featured_image]|is_image[featured_image]|max_size[featured_image, 2048]',
                        'errors' => [
                            'uploaded' => 'Imagen del Mensaje es Requerido',
                            'is_image' => 'Debe de subir una imagen con formato valido',
                            'max_size' => 'La imagen es demasiado pesado, debe de seleccionar una de menos de 2mb',
                        ]
                    ]
                ]);
            } else {
                $this->validate([
                    'title' => [
                        'rules' => 'required|is_unique[posts.title,id,' . $post_id . ']',
                        'errors' => [
                            'required' => 'Titulo del Mensaje es Requerido',
                            'is_unique' => 'Este titulo de Mensaje ya existe'
                        ]
                    ],
                    'content' => [
                        'rules' => 'required|min_length[20]',
                        'errors' => [
                            'required' => 'Contenido del Mensaje es Requerido',
                            'min_length' => 'El contenido del mensaje debe de contener al menos 20 caracteres'
                        ]
                    ],
                ]);
            }
            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                if (isset($_FILES['featured_image']['name']) && !empty($_FILES['featured_image']['name'])) {
                    $path = 'images/posts/';
                    $file = $request->getFile('featured_image');
                    $filename = 'beland_'.time().$file->getClientName();
                    $old_post_featured_image = $post->asObject()->find($post_id)->featured_image;
                    if ($file->move($path, $filename)) {
                        // eliminar imagen anterior
                        if ($old_post_featured_image != null && file_exists($path . $old_post_featured_image)) {
                            unlink($path . $old_post_featured_image);
                        }

                        $title = $request->getVar('title');
                        $title_slug = Slugify::model(Posts::class)->make($title);

                        // actualizar
                        $data = array(
                            'author_id' => $user_id,
                            'category_id' => $request->getVar('category'),
                            'title' => $request->getVar('title'),
                            'leyenda' => $request->getVar('leyenda'),
                            'slug' => $title_slug,
                            'featured_image' => $filename,
                            'content' => $request->getVar('content'),
                            'tags' => $request->getVar('tags'),
                            'meta_title' => $request->getVar('meta_title'),
                            'meta_keywords' => $request->getVar('meta_keywords'),
                            'meta_description' => $request->getVar('meta_description'),
                            'visibility' => $request->getVar('visibility'),
                        );
                        $update = $post->update($post_id, $data);
                        if ($update) {
                            return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Mensaje ha sido actualizado con exito']);
                        } else {
                            return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                        }
                    } else {
                        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Error subiendo la imagen']);
                    }
                } else {
                    $title = $request->getVar('title');
                    $title_slug = Slugify::model(Posts::class)->make($title);
                    $data = array(
                        'author_id' => $user_id,
                        'category_id' => $request->getVar('category'),
                        'title' => $request->getVar('title'),
                        'slug' => $title_slug,
                        'content' => $request->getVar('content'),
                        'tags' => $request->getVar('tags'),
                        'leyenda' => $request->getVar('leyenda'),
                        'meta_title' => $request->getVar('meta_title'),
                        'meta_keywords' => $request->getVar('meta_keywords'),
                        'meta_description' => $request->getVar('meta_description'),
                        'visibility' => $request->getVar('visibility'),
                    );
                    $update = $post->update($post_id, $data);
                    if ($update) {
                        return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Mensaje ha sido actualizado con exito']);
                    } else {
                        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                    }
                }
            }
        }
    }

    public function deletePost()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $path = 'images/posts/';
            $post_id = $request->getVar('post_id');
            $post = new Posts();
            $postInfo = $post->asObject()->find($post_id);
            $post_featured_image = $postInfo->featured_image;

            if ($post_featured_image != null && file_exists($path . $post_featured_image)) {
                unlink($path . $post_featured_image);
            }

            $delete = $post->delete($post_id);
            if ($delete) {
                return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "El Mensaje ha sido eliminado con exito"]);
            } else {
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
            }
        }
    }
}

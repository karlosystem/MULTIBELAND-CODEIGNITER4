<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Models\User;
use App\Libraries\Hash;

class AdminController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Panel de Control'
        ];
        return view('backend/pages/home', $data);
    }

    public function logoutHandler()
    {
        CIAuth::forget();
        return redirect()->route('admin.login.form')->with('fail', 'Saliste del Sistema');
    }

    public function profile()
    {
        $data = array(
            'pageTitle' => 'Perfil de Usuario'
        );
        return view('backend/pages/profile', $data);
    }

    public function updatePersonalDetails()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $user_id = CIAuth::id();

        if ($request->isAJAX()) {
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nombre es obligatorio'
                    ]
                ],
                'username' => [
                    'rules' => 'required|min_length[4]|is_unique[users.username,id,' . $user_id . ']',
                    'errors' => [
                        'required' => 'Usuario es obligatorio',
                        'min_length' => 'Usuario debe tener al menos 4 caracteres',
                        'is_unique' => 'El usuario ya existe en la base de datos'
                    ]
                ]
            ]);
            if ($validation->run() == FALSE) {
                $errors = $validation->getErrors();
                return json_encode(['status' => 0, 'error' => $errors]);
            } else {
                $user = new User();
                $update = $user->where('id', $user_id)->set([
                    'name' => $request->getVar('name'),
                    'username' => $request->getVar('username'),
                    'bio' => $request->getVar('bio'),
                ])->update();

                if ($update) {
                    $user_info = $user->find($user_id);
                    return json_encode(['status' => 1, 'user_info' => $user_info, 'msg' => "El Usuario ha sido registrado con exito"]);
                } else {
                    return json_encode(['status' => 0, 'msg' => 'Ha ocurrido un error al registrar el usuario']);
                }
            }
        }
    }

    public function updateProfilePicture()
    {
        $request = \Config\Services::request();
        $user_id = CIAuth::id();
        $user = new User();
        $user_info = $user->asObject()->where('id', $user_id)->first();

        $path = 'images/users/';
        $file = $request->getFile('user_profile_file');
        $old_picture = $user_info->picture;
        $new_filename = 'UIMG_' . $user_id . $file->getRandomName();

        if ($file->move($path, $new_filename)) {
            if ($old_picture != null && file_exists($path . $old_picture)) {
                unlink($path . $old_picture);
            }
            $user->where('id', $user_info->id)->set(['picture' => $new_filename])->update();
            return json_encode(['status' => 1, 'msg' => "Su foto ha sido actualizado"]);
        } else {
            echo json_encode(['status' => 0, 'msg' => 'Ha ocurrido un error al subir la foto']);
        }

        //MANIPULACION DE IMAGEN
        /*  $upload_image = \Config\Services::image()->withFile($file)->resize(450, 450, true, 'height')->save($path.$new_filename);

        if($upload_image){
            if ($old_picture != null && file_exists($path.$new_filename)) {
                 unlink($path.$old_picture);
                 return json_encode(['status'=>1,'msg'=>"Su foto ha sido actualizado"]);
            }     
            $user->where('id', $user_info->id)->set(['picture'=>$new_filename])->update();
        }else{
            echo json_encode(['status'=>0, 'msg'=>'Ha ocurrido un error al subir la foto']);  
        } */
    }

    public function changePassword()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $user_id = CIAuth::id();
            $user = new User();
            $user_info = $user->asObject()->where('id', $user_id)->first();
            //validar el formulario
            $this->validate([
                'current_password' => [
                    'rules' => 'required|min_length[5]|check_current_password[current_password]',
                    'errors' => [
                        'required' => 'Ingrese su Password',
                        'min_length' => 'Usuario debe tener al menos 5 caracteres',
                        'check_current_password' => 'El password actual es incorrecto'
                    ]
                ],
                'new_password' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'El nuevo password es obligatorio',
                        'min_length' => 'El nuevo password debe tener al menos 5 caracteres',
                        'max_length' => 'El nuevo password debe tener no debe exceder los 20 caracteres',
                    ]
                ],
                'confirm_new_password' => [
                    'rules' => 'required|matches[new_password]',
                    'errors' => [
                        'required' => 'Confirmar el nuevo password',
                        'matches' => 'Los passwords no son iguales',
                    ]
                ]
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                //return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(), 'msg'=>'Bien']);
                //actualizar user(admin) password BD
                $user->where('id', $user_info->id)->set(['password' => Hash::make($request->getVar('new_password'))])->update();

                // Enviar notificacion al usuario
                $mail_data = array(
                    'user' => $user_info,
                    'new_password' => $request->getVar('new_password')
                );

                $view = \Config\Services::renderer();
                $mail_body = $view->setVar('mail_data', $mail_data)->render('email-templates/password-changed-email-template');

                $mailConfig = array(
                    'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                    'mail_from_name' => env('EMAIL_FROM_NAME'),
                    'mail_recipient_email' => $user_info->email,
                    'mail_recipient_name' => $user_info->name,
                    'mail_subject' => 'Cambiar Password',
                    'mail_body' => $mail_body,
                );
                sendEmail($mailConfig);
                return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su password ha sido actualizado"]);
            }
        }
    }
    
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\User;
use App\Models\PasswordResetToken;
use Carbon\Carbon;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];

    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login',
            'validation' => null
        ];
        return view('backend/pages/auth/login', $data);
    }

    public function loginHandler()
    {
        $fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        //echo $fieldType; username or email
        if ($fieldType == 'email') {
            $isValid = $this->validate([

                'login_id' => [
                    'rules' => 'required|valid_email|is_not_unique[users.email]',
                    'errors' => [
                        'required' => 'Email es requerido',
                        'valid_email' => 'Por favor verifique su email, debe estar bien escrito',
                        'is_not_unique' => 'Email no existe en nuestra base de datos de usuarios'
                    ]
                ],

                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password es requerido',
                        'min_length' => 'Por favor verifique el password 5 caracteres como minimo',
                        'max_length' => 'Por favor verifique el password 45 caracteres como maximo',
                    ]
                ]

            ]);
        } else { // username
            $isValid = $this->validate([
                'login_id' => [
                    'rules' => 'required|is_not_unique[users.username]',
                    'errors' => [
                        'required' => 'Usuario es requerido',
                        'is_not_unique' => 'Usuario no existe en nuestra base de datos de sistema'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password es requerido',
                        'min_length' => 'Por favor verifique el password 5 caracteres como minimo',
                        'max_length' => 'Por favor verifique el password 45 caracteres como maximo',
                    ]
                ]
            ]);
        }

        if (!$isValid) {
            return view('backend/pages/auth/login', [
                'pageTitle' => 'Login',
                'validation' => $this->validator
            ]);
        } else {
            $user = new User();
            $userInfo = $user->where($fieldType, $this->request->getVar('login_id'))->first();
            $check_password = Hash::check($this->request->getVar('password'), $userInfo['password']);

            if (!$check_password) {
                return redirect()->route('admin.login.form')->with('fail', 'Password Incorrecto')->withInput();
            } else {
                CIAuth::setCIAuth($userInfo);
                return redirect()->route('admin.home');
            }
        }
    }

    public function forgotForm()
    {
        $data = [
            'pageTitle' => 'Olvido su Password',
            'validation' => null
        ];
        return view('backend/pages/auth/forgot', $data);
    }

    public function sendPasswordResetLink()
    {
        $isValid = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email es requerido',
                    'valid_email' => 'Por favor verifique su email, tiene que ser valido',
                    'is_not_unique' => 'Email no existe en nuestra base de datos de sistema'
                ]
            ]
        ]);

        if (!$isValid) {
            return view('backend/pages/auth/forgot', [
                'pageTitle' => 'Olvido su Password',
                'validation' => $this->validator
            ]);
        } else {
            $user = new User();
            $user_info = $user->asObject()->where('email', $this->request->getVar('email'))->first();
            //generar Token
            $token = bin2hex(openssl_random_pseudo_bytes(65));

            //get reset password token
            $password_reset_token = new PasswordResetToken();
            $isOldTokenExists = $password_reset_token->asObject()->where('email', $user_info->email)->first();

            if ($isOldTokenExists) {
                //actualizar el token existente
                $password_reset_token->where('email', $user_info->email)
                    ->set(['token' => $token, 'created_at' => Carbon::now()])
                    ->update();
            } else {
                $password_reset_token->insert([
                    'email' => $user_info->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            }
            // crear el link
            //$actionLink = route_to('admin.reset-password', $token);

            $actionLink = base_url(route_to('admin.reset-password', $token));

            $mail_data = array(
                'actionLink' => $actionLink,
                'user' => $user_info,
            );
            $view = \Config\Services::renderer();
            $mail_body = $view->setVar('mail_data', $mail_data)->render('email-templates/forgot-email-template');
            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $user_info->email,
                'mail_recipient_name' => $user_info->name,
                'mail_subject' => 'Recuperar Password',
                'mail_body' => $mail_body,
            );

            //enviar email
            if (sendEmail($mailConfig)) {
                return redirect()->route('admin.forgot.form')->with('success', 'Hemos enviado un correo electronico para que cambiar su clave de acceso');
            } else {
                return redirect()->route('admin.forgot.form')->with('fail', 'Hay un error en el envio');
            }
        }
    }


    public function resetPassword($token)
    {
        $passwordResetPassword = new PasswordResetToken();
        $check_token = $passwordResetPassword->asObject()->where('token', $token)->first();
        if (!$check_token) {
            return redirect()->route('admin.forgot.form')->with('fail', 'Token invalido, envie otro password link');
        } else {
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $check_token->created_at)->diffInMinutes(Carbon::now());
            if ($diffMins > 15) {
                //cuando el token expira luego de 15 minutos
                return redirect()->route('admin.forgot.form')->with('fail', 'Token expirado, envie otro password link');
            } else {
                return view('backend/pages/auth/reset', [
                    'pageTitle' => 'Reset Password',
                    'validation' => null,
                    'token' => $token
                ]);
            }
        }
    }

    public function resetPasswordHandler($token)
    {
        $isValid = $this->validate([
            'new_password' => [
                'rules' => 'required|min_length[5]|max_length[20]|is_password_strong[new_password]',
                'errors' => [
                    'required' => 'Ingrese su nuevo password',
                    'min_length' => 'Nuevo password debe tener al menos 5 caracteres',
                    'max_length' => 'Nuevo password debe tener maximo 20 caracteres',
                    'is_password_strong' => 'Nuevo password debe tener 1 caracter Mayuscula, 1 minuscula, 1 numero, 1 caracter especial',
                ]
            ],
            'confirm_new_password' => [
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => 'Ingrese su confirmacion password',
                    'matches' => 'confirmacion de nuevo password no coincide',
                ]
            ]
        ]);
        if (!$isValid) {
            return view('backend/pages/auth/reset', [
                'pageTitle' => 'Cambiar Password',
                'validation' => null,
                'token' => $token,

            ]);
        } else {
            $passwordResetPassword = new PasswordResetToken();
            $get_token = $passwordResetPassword->asObject()->where('token', $token)->first();

            $user = new User();
            $user_info = $user->asObject()->where('email', $get_token->email)->first();

            if (!$get_token) {
                return redirect()->back()->with('fail', 'Token invalido')->withInput();
            } else {
                //actualizar
                $user->where('email', $user_info->email)
                    ->set(['password' => Hash::make($this->request->getVar('new_password'))])
                    ->update();

                // Enviar notificacion al usuario
                $mail_data = array(
                    'user' => $user_info,
                    'new_password' => $this->request->getVar('new_password')
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

                //enviar email
                if (sendEmail($mailConfig)) {
                    //Eliminar TOKEN
                    $passwordResetPassword->where('email', $user_info->email)->delete();
                    return redirect()->route('admin.login.form')->with('success', 'Su clave de acceso ha sido cambiado con exito');
                } else {
                    return redirect()->route('admin.forgot.form')->withInput();
                }

            }
        }
    }
}

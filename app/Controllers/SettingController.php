<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Libraries\Hash;
use App\Libraries\CIAuth;

class SettingController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        $data = array(
            'pageTitle' => 'Configuracion'
        );
        return view('backend/pages/settings', $data);
    }

    public function updateGeneralSettings()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $this->validate([
                'blog_title' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Ingrese el titulo de la pagina web',
                    ]
                ],
                'blog_email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Ingrese su correo electronico',
                        'valid_email' => 'formato de correo es invalido',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                $settings = new Setting();
                $setting_id = $settings->asObject()->first()->id;
                $update = $settings->where('id', $setting_id)->set([
                    'blog_title' => $request->getVar('blog_title'),
                    'blog_email' => $request->getVar('blog_email'),
                    'blog_phone' => $request->getVar('blog_phone'),
                    'blog_address' => $request->getVar('blog_address'),
                    'blog_meta_keywords' => $request->getVar('blog_meta_keywords'),
                    'blog_meta_description' => $request->getVar('blog_meta_description')
                ])->update();

                if ($update) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Configuracion general ha sido actualizado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => "Ha ocurrido un error"]);
                }
            }
        }
    }

    public function updateBlogLogo()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $settings = new Setting();
            $path = 'images/blog/';
            $file = $request->getFile('blog_logo');
            $setting_data = $settings->asObject()->first();
            $old_blog_logo = $setting_data->blog_logo;
            $new_filename = 'KARLOSYSTEM' . $file->getRandomName();
            if ($file->move($path, $new_filename)) {
                if ($old_blog_logo != null && file_exists($path . $old_blog_logo)) {
                    unlink($path . $old_blog_logo);
                }
                $update = $settings->where('id', $setting_data->id)->set(['blog_logo' => $new_filename])->update();

                if ($update) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Logo ha sido actualizado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => "Ha ocurrido un error"]);
                }
            } else {
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
            }
        }
    }

    public function updateBlogFavicon()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $settings = new Setting();
            $path = 'images/blog/';
            $file = $request->getFile('blog_favicon');
            $setting_data = $settings->asObject()->first();
            $old_blog_favicon = $setting_data->blog_favicon;
            $new_filename = 'favicon_' . $file->getRandomName();

            if ($file->move($path, $new_filename)) {
                if ($old_blog_favicon != null && file_exists($path . $old_blog_favicon)) {
                    unlink($path . $old_blog_favicon);
                }
                $update = $settings->where('id', $setting_data->id)->set(['blog_favicon' => $new_filename])->update();

                if ($update) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Su Favicon ha sido actualizado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => "Ha ocurrido un error"]);
                }
            } else {
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
            }
        }
    }

    public function updateSocialMedia()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $this->validate([
                'facebook_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de pagina de facebook invalido',
                    ]
                ],
                'instagram_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de pagina de Instagram invalido',
                    ]
                ],
                'youtube_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de canal de YouTube invalido',
                    ]
                ],
                'tiktok_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de canal de TIKTOK invalido',
                    ]
                ],
                'whastapp_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de whastapp invalido',
                    ]
                ],
                'telegram_url' => [
                    'rules' => 'permit_empty|valid_url_strict',
                    'errors' => [
                        'valid_url_strict' => 'URL de telegram invalido',
                    ]
                ],
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();
                return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
            } else {
                //return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(),'msg'=>"form validado..."]);
                $social_media = new SocialMedia();
                $social_media_id = $social_media->asObject()->first()->id;
                $update = $social_media->where('id', $social_media_id)
                    ->set([
                        'facebook_url' => $request->getVar('facebook_url'),
                        'instagram_url' => $request->getVar('instagram_url'),
                        'youtube_url' => $request->getVar('youtube_url'),
                        'tiktok_url' => $request->getVar('tiktok_url'),
                        'whastapp_url' => $request->getVar('whastapp_url'),
                        'telegram_url' => $request->getVar('telegram_url'),
                    ])->update();
                if ($update) {
                    return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => "Sus redes sociales han sido actualizado con exito"]);
                } else {
                    return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Ha ocurrido un error']);
                }
            }
        }
    }
}

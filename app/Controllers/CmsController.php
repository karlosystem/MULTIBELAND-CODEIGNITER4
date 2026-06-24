<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Posts;
use App\Models\Contactenos;

class CmsController extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions', 'text'];

    public function index()
    {
        $data = [
        //'pageTitle' => get_settings()->blog_title
		'pageTitle' => 'MULTI BELAND S.A.C. - Empresa especializada en mantenimiento y reacondicionamiento de maquinaria pesada. Soluciones en pintura, soldadura, tapicería y vidriería para el sector minero, agrícola e industrial.'
        ];
        return view('frontend/pages/home', $data);
    }

    public function contactUs()
    {
        $data = [
            'pageTitle' => 'Contáctenos',
            'validation' => null
        ];
        return view('frontend/pages/contact_us', $data);
    }

    public function contactUsSend()
    {
        $request = \Config\Services::request();
        $isValid = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El nombre es obligatorio',
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El celular es obligatorio',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email es requerido',
                    'valid_email' => 'Por favor verifique su email, debe estar bien escrito',
                ]
            ],
            'mensaje' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El mensaje es obligatorio',
                ]
            ],
        ]);
        if (!$isValid) {
            return view('frontend/pages/contact_us', [
                'pageTitle' => 'Contáctenos',
                'validation' => $this->validator
            ]);
        } else {
            $mail_body = 'Mensaje de : <b>' . $request->getVar('name') . '</b></br>';
            $mail_body .= 'Celular : <b>' . $request->getVar('phone') . '</b></br>';
            $mail_body .= 'Email : <b>' . $request->getVar('email') . '</b></br>';
            $mail_body .= '================================================</br>';
            $mail_body .= 'Comentario : <b>' . $request->getVar('mensaje') . '</b></br>';
            $mailConfig = array(
                //'mail_from_email' => $request->getVar('email'),
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => $request->getVar('name'),
                'mail_recipient_email' => get_settings()->blog_email,
                'mail_recipient_name' => get_settings()->blog_title,
                'mail_subject' => 'Email desde www.multibeland.com',
                'mail_body' => 'MENSAJE DESDE LA PAGINA WEB',
                'mail_body' => $mail_body,
            );
            if (sendEmail($mailConfig)) {
                $contactenos = new Contactenos();
                $data = array(
                    'name' => $request->getVar('name'),
                    'email' => $request->getVar('email'),
                    'phone' => $request->getVar('phone'),
                    'description' => $request->getVar('mensaje')
                );
                $contactenos->insert($data);
                return redirect()->route('contact-us')->with('success', 'Su mensaje se ha enviado con exito.');
            } else {
                return redirect()->route('contact-us')->with('fail', 'Hay un error en el envio');
            }
        }
    }

    public function galeria()
    {
        $data = [
            'pageTitle' => 'Galeria de Fotos',
            'validation' => null
        ];
        return view('frontend/pages/galeria', $data);
    }

    public function servicios()
    {
        $data = [
            'pageTitle' => 'Nuestros Servicios',
            'validation' => null
        ];
        return view('frontend/pages/servicios', $data);
    }

    public function nosotros()
    {
        $data = [
            'pageTitle' => 'Nosotros',
            'validation' => null
        ];
        return view('frontend/pages/nosotros', $data);
    }

    public function clientes()
    {
        $data = [
            'pageTitle' => 'Clientes',
            'validation' => null
        ];
        return view('frontend/pages/clientes', $data);
    }

    public function readPost($slug)
    {
        $post = new Posts();
        try {
            $post = $post->asObject()->where('slug', $slug)->first();
            $data = [
                'pageTitle' => $post->meta_title,
                'post' => $post
            ];
            return view('frontend/pages/single_post', $data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}

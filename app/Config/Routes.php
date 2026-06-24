<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\PostsController;
use App\Controllers\BannersController;
use App\Controllers\CmsController;
use App\Controllers\ContactenosController;
use App\Controllers\SettingController;
use App\Controllers\SubCategoriasController;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Cms');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'CmsController::index');
$routes->get('arequipa/(:any)', 'CmsController::readPost/$1', ['as'=>'read-post']);
$routes->get('contact-us', 'CmsController::contactUs', ['as'=>'contact-us']);
$routes->post('contact-us', 'CmsController::contactUsSend', ['as'=>'contact-us-send']);

$routes->get('galeria', 'CmsController::galeria', ['as'=>'galeria']);
$routes->get('clientes', 'CmsController::clientes', ['as'=>'clientes']);
$routes->get('servicios', 'CmsController::servicios', ['as'=>'servicios']);
$routes->get('nosotros', 'CmsController::nosotros', ['as'=>'nosotros']);

$routes->group('admin', static function($routes){
    $routes->group('', ['filter'=>'cifilter:auth'], static function ($routes){
        
        //admin
        $routes->get('home', 'AdminController::index', ['as'=>'admin.home']);
        $routes->get('logout', 'AdminController::logoutHandler', ['as'=>'admin.logout']);
        $routes->get('profile', 'AdminController::profile', ['as'=>'admin.profile']);
        $routes->post('update-personal-details', 'AdminController::updatePersonalDetails', ['as'=>'update-personal-details']);
        $routes->post('update-profile-picture', 'AdminController::updateProfilePicture', ['as'=>'update-profile-picture']);
        $routes->post('change-password', 'AdminController::changePassword', ['as'=>'change-password']);

        // configuracion
        $routes->get('settings', 'SettingController::index', ['as'=>'settings']);
        $routes->post('update-general-settings', 'SettingController::updateGeneralSettings', ['as'=>'update-general-settings']);
        $routes->post('update-blog-logo', 'SettingController::updateBlogLogo', ['as'=>'update-blog-logo']);
        $routes->post('update-blog-favicon', 'SettingController::updateBlogFavicon', ['as'=>'update-blog-favicon']);
        $routes->post('update-social-media', 'SettingController::updateSocialMedia', ['as'=>'update-social-media']);

        //categorias
        $routes->get('categories', 'CategoriasController::index', ['as'=>'categories']);
        $routes->post('add-category', 'CategoriasController::addCategory', ['as'=>'add-category']);
        $routes->get('get-categories', 'CategoriasController::getCategories', ['as'=>'get-categories']);
        $routes->get('get-category', 'CategoriasController::getCategory', ['as'=>'get-category']);
        $routes->post('update-category', 'CategoriasController::updateCategory', ['as'=>'update-category']);
        $routes->get('delete-category', 'CategoriasController::deleteCategory', ['as'=>'delete-category']);
        $routes->get('reorder-categories', 'CategoriasController::reorderCategories', ['as'=>'reorder-categories']);

         //sub categories
        $routes->get('get-parent-categories', 'SubCategoriasController::getParentCategories', ['as'=>'get-parent-categories']);
        $routes->post('add-subcategory', 'SubCategoriasController::addSubCategory', ['as'=>'add-subcategory']);
        $routes->get('get-subcategories', 'SubCategoriasController::getSubCategories', ['as'=>'get-subcategories']);
        $routes->get('get-subcategory', 'SubCategoriasController::getSubCategory', ['as'=>'get-subcategory']);
        $routes->post('update-subcategory', 'SubCategoriasController::updateSubCategory', ['as'=>'update-subcategory']);
        $routes->get('reorder-subcategories', 'SubCategoriasController::reorderSubCategories', ['as'=>'reorder-subcategories']);
        $routes->get('delete-subcategory', 'SubCategoriasController::deleteSubCategory', ['as'=>'delete-subcategory']);

        // Mensajes
        $routes->group('posts', static function($routes){
            $routes->get('new-post', 'PostsController::addPost', ['as'=>'new-post']);
            $routes->post('create-post', 'PostsController::createPost', ['as'=>'create-post']);
            $routes->get('/', 'PostsController::allPosts', ['as'=>'all-posts']);
            $routes->get('get-posts', 'PostsController::getPost', ['as'=>'get-posts']);
            $routes->get('edit-post/(:any)', 'PostsController::editPost/$1', ['as'=>'edit-post']);
            $routes->post('update-post', 'PostsController::updatePost', ['as'=>'update-post']);
            $routes->get('delete-post', 'PostsController::deletePost', ['as'=>'delete-post']);            
        });

        //banners
        $routes->group('banners', static function($routes){
            $routes->get('/', 'BannersController::index', ['as'=>'banners']);
            $routes->get('get-banners', 'BannersController::getBanners', ['as'=>'get-banners']);
            $routes->get('new-banner', 'BannersController::addBanner', ['as'=>'new-banner']);
            $routes->post('create-banner', 'BannersController::createBanner', ['as'=>'create-banner']);
            $routes->get('delete-banner', 'BannersController::deleteBanner', ['as'=>'delete-banner']);
            $routes->get('edit-banner/(:any)', 'BannersController::editBanner/$1', ['as'=>'edit-banner']);
            $routes->post('update-banner', 'BannersController::updateBanner', ['as'=>'update-banner']);
            $routes->get('reorder-banners', 'BannersController::reorderBanners', ['as'=>'reorder-banners']);
        });

        // contactenos
        $routes->group('contactenos', static function($routes){
            $routes->get('/', 'ContactenosController::index', ['as'=>'contactenos']);
            $routes->get('get-contactenos', 'ContactenosController::getContactenos', ['as'=>'get-contactenos']);           
        });

    });

    // FRONT END
    $routes->group('', ['filter'=>'cifilter:guest'], static function ($routes){
        //$routes->view('example-auth', 'example-auth');
        //http://localhost:8080/admin/example-auth
        $routes->get('login', 'AuthController::loginForm', ['as'=>'admin.login.form']);
        $routes->post('login', 'AuthController::loginHandler', ['as' => 'admin.login.handler']);
        $routes->get('forgot-password', 'AuthController::forgotForm', ['as'=>'admin.forgot.form']);
        $routes->post('send-password-reset-link', 'AuthController::sendPasswordResetLink', ['as'=>'send_password_reset_link']);
        $routes->get('password/reset/(:any)', 'AuthController::resetPassword/$1', ['as'=>'admin.reset-password']);  
        $routes->post('reset-password-handler/(:any)', 'AuthController::resetPasswordHandler/$1', ['as'=>'admin.reset-password-handler']);  
    });
});



if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

<?php
use App\Libraries\CIAuth;
use App\Models\Banners;
use App\Models\User;
use App\Models\Categorias;
use App\Models\SubCategory;
use App\Models\Setting;
use App\Models\SocialMedia;
use Carbon\Carbon;
use App\Models\Posts;

if (!function_exists('get_user')) {
    
    function get_user(){
        if (CIAuth::check()) {
            $user = new User();
            return $user->asObject()->where('id', CIAuth::id())->first();
        }else{
            return null;
        }
    }
} 

if (!function_exists('get_settings')) {
    function get_settings(){
       $settings = new Setting();
       $settings_data = $settings->asObject()->first();

       if (!$settings_data) {
        $data = array(
            'blog_title'=>'MultiBeland S.A.C.',
            'blog_email'=>'ventas@multibeland.com',
            'blog_phone'=>null,
            'blog_meta_keywords'=>null,
            'blog_meta_description'=>null,
            'blog_logo'=>null,
            'blog_favicon'=>null,
        );
        $settings->save($data);
        $new_settings_data = $settings->asObject()->first();
            return $new_settings_data;
       }else{
            return $settings_data;
       }
    }
} 

if (!function_exists('get_social_media')) {
    function get_social_media(){
       $result = null;
       $social_media = new SocialMedia();
       $social_media_data = $social_media->asObject()->first();

       if (!$social_media_data) {
        $data = array(
            'facebook_url'=>null,
            'instagram_url'=>null,
            'youtube_url'=>null,
            'tiktok_url'=>null,
            'whastapp_url'=>null,
            'telegram_url'=>null,
        );
        $social_media->save($data);
        $new_social_media_data = $social_media->asObject()->first();
        $result = $new_social_media_data;
       }else{
        $result = $social_media_data;
           
       }
       return $result;
    }
} 

 if (!function_exists('current_route_name')) {
    function current_route_name(){
        $router = \CodeIgniter\Config\Services::router();
        $router_name = $router->getMatchedRouteOptions()['as'];
        return $router_name;
    }
}

if (!function_exists('get_parent_categories')) {
    function get_parent_categories(){
       $category = new Categorias();
       return $category->asObject()->orderBy('ordering', 'asc')->findAll();
    }
}

if (!function_exists('get_subcategories_by_parent_category_id')) {
    function get_subcategories_by_parent_category_id($id){
       $subcategory = new SubCategory();
       return $subcategory->asObject()->orderBy('ordering', 'asc')->where('parent_cat', $id)->findAll();
    }
}

if (!function_exists('get_banners_all')) {
    function get_banners_all(){
       $banners = new Banners();
       return $banners->asObject()->where('visibility', 1)->orderBy('id', 'asc')->findAll();
    }
}

if (!function_exists('get_posts_all')) {
    function get_posts_all(){
       $posts = new Posts();
       return $posts->asObject()->where('visibility', 1)->orderBy('id', 'asc')->findAll();
    }
}

if (!function_exists('get_4_home_latest_posts')) {
    function get_4_home_latest_posts(){
      $post = new Posts();
      return $post->asObject()->where('visibility', 1)->limit(4,1)->orderBy('created_at', 'desc')->get()->getResult();
    }
}

if (!function_exists('date_formatter')) {
    function date_formatter($date){
       return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('ll');
    }
}

if (!function_exists('get_reading_time')) {
    function get_reading_time($content){
       $word_count = str_word_count(strip_tags($content));
       $word_per_minute = 200;
       $m = ceil($word_count / $word_per_minute);
       return $m <= 1 ? $m. ' min leido' : $m. ' mins leidos';
    }
}

if (!function_exists('limit_words')) {
    function limit_words($content = null, $limit = 20){
      return word_limiter($content, $limit);
    }
}

if (!function_exists('get_home_main_lastet_post')) {
    function get_home_main_lastet_post(){
      $post = new Posts();
      return $post->asObject()->where('visibility', 1)->orderBy('created_at', 'desc')->first();
    }
}

if (!function_exists('get_6_home_latest_posts')) {
    function get_6_home_latest_posts(){
      $post = new Posts();
      return $post->asObject()->where('visibility', 1)->limit(6,1)->orderBy('created_at', 'desc')->get()->getResult();
    }
}

if (!function_exists('get_sidebar_random_posts')) {
    function get_sidebar_random_posts($max = 4){
      $post = new Posts();
      return $post->asObject()->where('visibility', 1)->limit($max)->orderBy('rand()')->get()->getResult();
    }
}

if (!function_exists('get_sidebar_categories')) {
    function get_sidebar_categories(){
      $subcat = new SubCategory();
      return $subcat->asObject()->orderBy('name', 'asc')->findAll();
    }
}

// cantidad de mensajes por categoria
if (!function_exists('posts_by_category_id')) {
    function posts_by_category_id($id){
      $post = new Posts();
      $posts = $post->where('visibility', 1)->where('category_id', $id)->findAll();
      return count($posts);
    }
}


// listado de Tags
if (!function_exists('get_tags')) {
    function get_tags($except = null){
      $post = new Posts();
      $tagsArray = [];
      $posts = $post->asObject()->where('visibility', 1)->where('tags != ', '')->orderBy('created_at', 'desc')->findAll();    
      foreach ($posts as $post) {
        array_push($tagsArray, $post->tags);
      }  
      $tagsList = implode(',', $tagsArray);
      return array_unique(array_map('trim', array_filter(explode(',', $tagsList), 'trim')));
    }
}

if (!function_exists('get_tags_by_post_id')) {
    function get_tags_by_post_id($id){
      $post = new Posts();
      $tags = $post->asObject()->find($id)->tags;
      return $tags != '' ? explode(',',$tags) : [];      
    }
}

// mensajes relacionados
if (!function_exists('get_related_posts_by_post_id')) {
    function get_related_posts_by_post_id($id, $limit = 3){
      $post = new Posts();
      $tags = $post->asObject()->find($id)->tags;
      $tagsArray = $tags != '' ? explode(',',$tags) : [];
      if (empty($tagsArray)) {
        $related_posts = [];
      } else {
        $post->select('*');
        $post->groupStart();
        foreach ($tagsArray as $tag) {
            $post->orLike('title', $tag)->orLike('tags', $tag);
        }
        $post->groupEnd();
        $posts = $post->asObject()
                        ->where('id !=',$id)
                        ->where('visibility',1)
                        ->limit($limit)
                        ->get()
                        ->getResult();
        $related_posts = count($posts) > 0 ? $posts : [];
      }
      return $related_posts;
    }
}

if (!function_exists('get_previous_post')) {
    function get_previous_post($id){
        $post = new Posts();
        $prev_post = $post->asObject()
                        ->where('id <',$id)
                        ->where('visibility',1)
                        ->limit(1)
                        ->orderBy('id', 'desc')
                        ->first();
        return !empty($prev_post) ? $prev_post : [];
    }
}

if (!function_exists('get_next_post')) {
    function get_next_post($id){
        $post = new Posts();
        $next_post = $post->asObject()
                        ->where('id >',$id)
                        ->where('visibility',1)
                        ->limit(1)
                        ->orderBy('id', 'desc')
                        ->first();
        return !empty($next_post) ? $next_post : [];
    }
}

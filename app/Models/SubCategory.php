<?php

namespace App\Models;

use CodeIgniter\Model;
//use \Mberecall\Sluggable\CI_Slugify;
use SawaStacks\CodeIgniter\Slugify;

class SubCategory extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sub_categories';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'slug',
        'parent_cat',
        'description',
        'ordering'
    ];

     /* 
    protected $beforeInsert = ['setSlug'];
    protected $beforeUpdate = ['setSlug'];

       public function setSlug($data)
    {
        $slugify = new Slugify($this);
       $slugify->field('slug_field');
        $data = $slugify->getSlug($data, 'name');
        return $data;
    } */

}

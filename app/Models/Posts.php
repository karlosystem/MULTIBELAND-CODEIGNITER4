<?php

namespace App\Models;

use CodeIgniter\Model;

class Posts extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'author_id',
        'category_id',
        'title',
        'leyenda',
        'slug',
        'content',
        'featured_image',
        'tags',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'visibility'
    ];
}

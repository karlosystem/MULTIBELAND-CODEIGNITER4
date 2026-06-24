<?php

namespace App\Models;

use CodeIgniter\Model;

class Banners extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'banners';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'author_id',
        'image',
        'slug',
        'link',
        'description',
        'ordering',
    ];
}

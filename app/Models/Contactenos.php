<?php

namespace App\Models;

use CodeIgniter\Model;

class Contactenos extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'contactenos';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'phone',
        'email',
        'description'
    ];
}

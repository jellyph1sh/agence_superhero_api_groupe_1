<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protected_cities_groups_Model extends Model
{
protected $table = "protected_cities_groups";
    public $timestamps = false;
    protected $primaryKey = 'id_protected_cities_groups';

    use HasFactory;
}

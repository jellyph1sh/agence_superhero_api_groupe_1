<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protected_cities_Model extends Model
{
protected $table = "protected_cities";
    protected $primaryKey = 'id_hero';

    use HasFactory;
}

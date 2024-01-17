<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculModel extends Model
{
    protected $table = 'vehicules';
    protected $primaryKey = 'id_vehicule';
    use HasFactory;
}

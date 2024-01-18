<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculeusersModel extends Model
{
    use HasFactory;

    protected $table = 'vehicules_users';
    protected $primaryKey = 'id_hero';
}

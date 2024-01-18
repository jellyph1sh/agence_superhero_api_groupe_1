<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicul_users_Model extends Model
{
    public $timestamps = false;
    protected $table = 'vehicules_users';
    use HasFactory;
}

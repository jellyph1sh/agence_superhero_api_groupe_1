<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadgets_users_Model extends Model
{
    protected $table='gadgets_users';
    protected $primaryKey = 'id_hero';

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power_users_model extends Model
{
    protected $table = 'power_users';
    protected $primaryKey = 'id_power'; 

    public $timestamps = false;

    use HasFactory;
}

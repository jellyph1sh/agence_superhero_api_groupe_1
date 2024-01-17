<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_user';

    protected $table = "users";
    use HasFactory;
}

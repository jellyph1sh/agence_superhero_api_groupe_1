<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupsModel extends Model
{

    protected $table = 'groups';
    public $timestamps = false;
    protected $primaryKey = 'id_group';
    use HasFactory;
}

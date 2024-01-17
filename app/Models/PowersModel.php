<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowersModel extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_power';

    protected $table = 'powers';
    use HasFactory;
}

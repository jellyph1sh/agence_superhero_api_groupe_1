<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citiesModel extends Model
{
    protected $table = 'cities';
    public $timestamps = false;
    protected $primaryKey = 'id_city';

    use HasFactory;
}

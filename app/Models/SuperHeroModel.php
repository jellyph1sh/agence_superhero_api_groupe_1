<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperHeroModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'superheroes';
    protected $primaryKey = 'id_hero'; 


}

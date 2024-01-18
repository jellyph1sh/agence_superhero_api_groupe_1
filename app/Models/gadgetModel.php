<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gadgetModel extends Model
{
    protected $table = 'gadgetS';
    public $timestamps = false;
    protected $primaryKey = 'id_gadget';

    use HasFactory;
}

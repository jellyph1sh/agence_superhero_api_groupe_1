<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function _invoke(){
        return [
            'user' => auth()->user()
        ];
    }
}

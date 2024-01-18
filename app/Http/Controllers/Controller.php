<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="My First API Documentation",
 *     version="0.1"
 *     
 * ),
 *  @OA\Server(
 *      description="SuperHero app",
 *      url="http://127.0.0.1:8000/documentation"
 *  ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

<?php
namespace App\Controllers;

use Laminas\Diactoros\ServerRequest;

class JsonController extends Controller
{  
    public function init(ServerRequest $request)
    {   
        return '<h1> Im JsonController';
    }
} 
?>
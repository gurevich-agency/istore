<?php
namespace App\Controllers;

use Laminas\Diactoros\ServerRequest;


class AddController extends Controller
{   

    public function init(ServerRequest $request)
    {   
        return 'AddController';
    }

} 
?>
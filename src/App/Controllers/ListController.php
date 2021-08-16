<?php
namespace App\Controllers;

use Laminas\Diactoros\ServerRequest;



class ListController extends Controller
{   

    public function init(ServerRequest $request)
    {   
        return 'ListController';
    }

} 
?>
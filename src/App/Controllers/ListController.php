<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;


class ListController extends Controller
{ 
    public function init(ServerRequest $request)
    {
        $render = new TemplateRenderer();
        return $render->render('App/Views/Templates/list.php', 
        [
            'title' => 'List of Users', 
            'a' => 1, 
            'b' => 2, 
            'c' => 3
        ]);
    }
} 
?>
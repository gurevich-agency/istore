<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;


class ListController extends Controller
{ 
    public function init(ServerRequest $request, $orm = null)
    {
        $render = new TemplateRenderer();
        return $render->render('App/Views/Templates/list.php', 
        [
            'title' => 'List of Users', 
            'active' => 'list',
            'orm' => $orm
            
        ]);
    }
} 
?>
<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;



class EditController extends Controller
{   

    public function init(ServerRequest $request)
    {
        $render = new TemplateRenderer();
        return $render->render('App/Views/Templates/edit.php', 
        [
            'title' => 'Edit User', 
            'active' => 'edit', 
            'x' => 100, 
            'y' => 200, 
            'z' => 300
        ]);
    }
} 
?>
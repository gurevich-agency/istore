<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;


class AddController extends Controller
{   
 
    public function init(ServerRequest $request, $orm = null)
    {
        $render = new TemplateRenderer();
        return $render->render('App/Views/Templates/add.php', 
        [
            'title' => 'Add new User', 
            'active' => 'add', 
            'orm' => $orm
        ]);
    }
    

} 
?>
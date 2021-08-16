<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;


class AddController extends Controller
{   
 
    public function init(ServerRequest $request)
    {
        $render = new TemplateRenderer();
        return $render->render('App/Views/Templates/add.php', 
        [
            'title' => 'Add new User', 
            'm' => 10, 
            'n' => 20, 
            'o' => 30
        ]);
    }
    

} 
?>
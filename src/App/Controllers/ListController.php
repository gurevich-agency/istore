<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;
use Laminas\Diactoros\ServerRequest;
use App\Db\User;


class ListController extends Controller
{ 
    public function init(ServerRequest $request, $orm = null)
    {
        $render = new TemplateRenderer();
        $arQuery = $request->getQueryParams();

        if (count($arQuery) > 0) {
            $sort = $arQuery['sort'];
            $direction = strtoupper($arQuery['direction']);
        }


        return $render->render('App/Views/Templates/list.php', 
        [
            'title' => 'List of Users', 
            'active' => 'list',
            'orm' => !(count($arQuery) > 0) ? $orm->getRepository(User::class)->select() : $orm->getRepository(User::class)->select()->orderBy($sort, $direction)            
            
        ]);
    }
} 
?>
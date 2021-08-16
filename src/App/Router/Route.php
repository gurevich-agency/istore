<?php
namespace App\Router;

use Laminas\Diactoros\ServerRequest;

class Route
{
    public $name;
    public $handler;    

    public function __construct(string $name, string $controller)
    {  
        $this->name = $name;
        $this->controller = $controller;        
    }

    public function match(ServerRequest $request): ?Result
    { 

        $arPath = array_values(array_filter(explode('/', $request->getUri()->getPath())));         

        if($arPath[0] == $this->name){
            $handler = isset($arPath[1]) ? $arPath[1] : 'init';
            return new Result($this->name, $this->controller, $handler, $request->getQueryParams()); 
        }

        return null;
    }
} 
?>
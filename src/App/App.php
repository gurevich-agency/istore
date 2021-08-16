<?php
namespace App;

use App\Router\Router;
use Laminas\Diactoros\ServerRequest;


class App
{
    private $router;    
    private $controller;

    public $response;
    
    public function __construct(ServerRequest $request)
    {          
        $this->router = Router::create($request) ?? null;
        $this->controller = $this->router->getController() ?? null; 
        $this->handler = $this->router->getHandler() ?? null;          
        
    }

    public function run(ServerRequest $request)
    {   
        if(!$this->validateRoute()){
            return $this->response;
        }
        $controller = $this->controller::create();
        $handler = $this->handler;
        $this->response = $controller->$handler($request); 
        return $this->response;
    }  
    
    private function validateRoute()
    { 
        $validate = true;
        switch (null) {
            case $this->router:                
                $this->response = 'Router not found!';                
                break;
            case $this->controller:                
                $this->response = 'Controller not found!';                
                break;
            case $this->handler:                
                $this->response = 'Handler not found!';                
                break;            
            default:
                # code...
                break;
        }
        if($this->response){
            $validate = null;            
        }
        return $validate;
    }

    public static function create(ServerRequest $request)
    {
        return new self($request);
    }
} 
?>
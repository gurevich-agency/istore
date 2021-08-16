<?php
namespace App\Router;

use Laminas\Diactoros\ServerRequest;


class Router{
    
    private $routes;
    private $request;

    public function __construct(ServerRequest $request)
    {       
        $this->routes = new RouteCollection();  
        $this->request = $request;    
    }

    public function match(ServerRequest $request): ?Result
    {   
        foreach($this->routes->getRoutes() as $route){  
           if($result = $route->match($request)){
               return $result;
           }
        }
        
        return null;       
    }

    public function getController(): ?string
    {   
        if(!$this->match($this->request)){            
            return null;
        }

        return 'Api\Controllers\\' . $this->match($this->request)->getController();        
    }

    public function getHandler(): ?string
    { 
        $handler = is_object($this->match($this->request)) ? $this->match($this->request)->getHandler() : null;        

        if(!$handler || !method_exists('Api\Controllers\\' . $this->match($this->request)->getController(), $handler)){            
            return null;
        } 

        return $handler;
    }

    public static function create(ServerRequest $request){
        return new self($request);
    }
} 
?>
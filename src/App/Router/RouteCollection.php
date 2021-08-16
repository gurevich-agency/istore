<?php
namespace App\Router;

class RouteCollection
{
    public $routes = [];    

    public function __construct()
    {
        $this->routes[] = new Route('add', 'AddController');
        $this->routes[] = new Route('list', 'ListController');
        $this->routes[] = new Route('edit', 'EditController');        
    }

    public function addRoute(Route $route){
        $this->routes[] = $route;
    }

    public function getRoutes(){
        return $this->routes;
    }

} 
?>
<?php
namespace App\Router;

class Result
{
    private $name;
    private $controller;    
    private $handler; 
    private $queryParams;

    public function __construct(string $name, string $controller, string $handler, array $queryParams)
    {
        $this->name = $name;
        $this->controller = $controller;  
        $this->handler = $handler;    
        $this->queryParams = $queryParams;    
    }

    public function getName(): ?string
    {
        return $this->name ?? null;
    }
    
    public function getController(): ?string
    {
        return $this->controller ?? null;
    }

    public function getHandler(): ?string
    {
        return $this->handler ?? null;
    }

    public function getQueryParams(): ?array
    {
        return $this->queryParams;
    }

}

?>
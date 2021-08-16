<?php
namespace App;

use App\Router\Router;
use Laminas\Diactoros\ServerRequest;
use App\Db\DbConnection;
use Cycle\ORM;
use Cycle\ORM\Schema;
use Cycle\ORM\Mapper\Mapper;
use App\Db\User;


class App
{
    private $router;    
    private $controller;

    public $response;
    public $orm; 

    
    public function __construct(ServerRequest $request)
    {          
        $this->router = Router::create($request) ?? null;
        $this->controller = $this->router->getController() ?? null; 
        $this->handler = $this->router->getHandler() ?? null; 

        $dbConnection = new DbConnection();
        $orm = new ORM\ORM(new ORM\Factory($dbConnection->getConnection()));

        $this->orm = $orm->withSchema(new Schema([
            'user' => [
                Schema::MAPPER      => Mapper::class, // default POPO mapper
                Schema::ENTITY      => User::class,
                Schema::DATABASE    => 'default',
                Schema::TABLE       => 'users',
                Schema::PRIMARY_KEY => 'id',
                Schema::COLUMNS     => [
                    'id'   => 'id',  // property => column
                    'name' => 'name',
                    'usertype' => 'usertype',
                    'phone' => 'phone',
                    'email' => 'email',
                    'address' => 'address',
                    'gender' => 'gender',
                    'favorite' => 'favorite',
                    'image' => 'image'
                ],
                Schema::TYPECAST    => [
                    'id' => 'int'
                ],
                Schema::RELATIONS   => []
            ]
        ]));
        
    }

    public function run(ServerRequest $request)
    {   
        if(!$this->validateRoute()){
            return $this->response;
        }
        $controller = $this->controller::create();
        $handler = $this->handler;
        $this->response = $controller->$handler($request, $this->orm); 
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
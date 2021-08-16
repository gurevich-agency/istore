<?php
namespace App\Db;

use Spiral\Database;

class DbConnection {
    private $connection;

    function __construct(){
        $this->connection = new Database\DatabaseManager(
            new Database\Config\DatabaseConfig([
                'default' => [
                    'connection'     => 'mysql',
                    // 'readConnection' => 'mysqlSlave',
                    // 'prefix'         => 'secondary_'
                ],
                'databases'   => [
                    'default' => ['connection' => 'mysql']
                ],
                'connections' => [
                    'mysql' => [
                        'driver'  => \Spiral\Database\Driver\MySQL\MySQLDriver::class,
                        'connection' => 'mysql:host=mariadb;dbname=istore',
                        'username'   => 'root',
                        'password'   => 'qwerty',
                    ]
                ]
            ])
        );
    }

    function getConnection(){
        return $this->connection;
    }
}
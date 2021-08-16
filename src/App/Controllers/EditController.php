<?php
namespace App\Controllers;
use Laminas\Diactoros\ServerRequest;
use App\Db\User;

class EditController extends Controller
{   
    public function init(ServerRequest $request, $orm = null)    
    {        
        $data = json_decode($request->getBody()->getContents(), true);

        if($data['action'] == 'update') {
            return $this->updateUser($data, $orm);
        }

        if($data['action'] == 'add') {
            return $this->addUser($data, $orm);
        }

    }

    function updateUser($data, $orm) {
        $arUsertype = $data['userType'];
        $arFavorite = $data['favorite'];

        if (count($arUsertype) > 0) {
            foreach ($arUsertype as $k => $v) {
                $u = $orm->getRepository(User::class)->findByPK($k);
                $u->setUsertype($v);
                (new \Cycle\ORM\Transaction($orm))->persist($u)->run();
            }
        }

        if (count($arFavorite) > 0) {
            foreach ($arFavorite as $k => $v) {
                $u = $orm->getRepository(User::class)->findByPK($k);
                $u->setFavorite($v);
                (new \Cycle\ORM\Transaction($orm))->persist($u)->run();
            }
        }

        return ['status' => 'ok'];
    }

    function addUser($data, $orm){

        $u = new User();

        foreach (array_filter($data['values']) as $k => $v) {            
            $name = 'set'.ucfirst($k);            
            $u->$name($v);
        }               
        
        $t = new \Cycle\ORM\Transaction($orm);
        $t->persist($u);
        $t->run();

        return ['status' => 'ok'];
    }
} 
?>
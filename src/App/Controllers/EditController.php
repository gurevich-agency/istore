<?php
namespace App\Controllers;
use Laminas\Diactoros\ServerRequest;
use App\Db\User;

class EditController extends Controller
{   
    public function init(ServerRequest $request, $orm = null)    
    {
        // $u = $orm->getRepository(User::class)->findByPK(2);
        $changes = json_decode($request->getBody()->getContents(), true);

        $arUsertype = $changes['userType'];
        $arFavorite = $changes['favorite'];

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

        // print_r($u);

        // $u->setName("New " . mt_rand(0, 1000));

        // (new \Cycle\ORM\Transaction($orm))->persist($u)->run();
    }
} 
?>
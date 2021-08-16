<?php

use App\Db\DbConnection;
use Spiral\Database;
use Cycle\ORM;
use Cycle\ORM\Schema;
use Cycle\ORM\Mapper\Mapper;
use Cycle\ORM\Transaction;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use App\Db\User;

$dbConnection = new DbConnection();
$orm = new ORM\ORM(new ORM\Factory($dbConnection->getConnection()));

$orm = $orm->withSchema(new Schema([
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

$extends = 'App/Views/Layouts/default/layout.php';
$this->params['title'] = $title;
$this->params['active'] = $active;
?>

<!-- 
customer name
Customer type - choice of the following types: private, business, student
phone
Email
full address
Gender - Choice of the following genders: man, woman, other.
Favorite products - multiple choice of the following options: iPad, iPhone, AppleTV, Apple Watch, Airpods, iMac, Macbook
Random image per user (using catAPI ) -->

<div class="">
    <div class="users">
        <div class="users__header">
            <div class="users__header-item name">
                Customer name
            </div>
            <div class="users__header-item type">
                Customer type
            </div>
            <div class="users__header-item phone">
                Phone
            </div>
            <div class="users__header-item email">
                Email
            </div>
            <div class="users__header-item address">
                Address
            </div>
            <div class="users__header-item gender">
                Gender
            </div>
            <div class="users__header-item favorite">
                Favorite
            </div>
            <div class="users__header-item image">
                Image
            </div>
        </div>
        <div class="users__body">           

            <?php foreach ($orm->getRepository(User::class)->findAll() as $user):?>
                <div class="users__body-row">
                    <div class="users__list-item name">
                        <?=$user->getName();?>
                    </div>
                    <div class="users__list-item type">
                        <?=$user->getUsertype();?>
                    </div>
                    <div class="users__list-item phone">
                        <?=$user->getPhone();?>
                    </div>
                    <div class="users__list-item email">
                        <?=$user->getEmail();?>
                    </div>
                    <div class="users__list-item address">
                        <?=$user->getAddress();?>
                    </div>
                    <div class="users__list-item gender">
                        <?=$user->getGender();?>
                    </div>
                    <div class="users__list-item favorite">
                        <?=$user->getFavorite();?>
                    </div>
                    <div class="users__list-item image">
                        <?=$user->getImage();?>
                    </div> 
                </div>
            <?php endforeach;?>
            
        </div>

        <div class="users__button-container">
            <a href="/add/" class="users__button btn btn-primary">
                Add new User
            </a>
        </div>
    </div>
</div>
<?php
use App\Db\User;

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
            <div class="users__header-item id">
                Id  <i class="bi bi-sort-up"></i>
            </div>
            <div class="users__header-item name">
                Name  <i class="bi bi-sort-up"></i>
            </div>
            <div class="users__header-item type">
                Customer type
            </div>
            <div class="users__header-item phone">
                Phone  <i class="bi bi-sort-up"></i>
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
            <div class="users__header-item delete">
                Action
            </div>
        </div>
        <div class="users__body">           

            <?php foreach ($orm->getRepository(User::class)->findAll() as $user):?>
                <div class="users__body-row align-items-center" data-rowid="<?=$user->getId()?>">
                    <div class="users__list-item id">
                        <?=$user->getId();?>
                    </div>
                    <div class="users__list-item name">
                        <?=$user->getName();?>
                    </div>
                                        
                    <select data-id="<?=$user->getId()?>" data-name="usertype" name="usertype" class="form-select users__list-item type">                            
                        <option <?php if ($user->getUsertype() == 'Private'):?> selected<?php endif;?> value="Private">Private</option>
                        <option <?php if ($user->getUsertype() == 'Business'):?> selected<?php endif;?> value="Business">Business</option>
                        <option <?php if ($user->getUsertype() == 'Student'):?> selected<?php endif;?> value="Student">Student</option>
                    </select>                        
                    
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
                    
                    <select data-id="<?=$user->getId()?>" data-name="favorite" name="favorite" class="form-select users__list-item favorite">                             
                        <option <?php if ($user->getFavorite() == 'iPad'):?> selected<?php endif;?> value="iPad">iPad</option>
                        <option <?php if ($user->getFavorite() == 'iPhone'):?> selected<?php endif;?> value="iPhone">iPhone</option>
                        <option <?php if ($user->getFavorite() == 'AppleTV'):?> selected<?php endif;?> value="AppleTV">AppleTV</option>
                        <option <?php if ($user->getFavorite() == 'Apple Watch'):?> selected<?php endif;?> value="Apple Watch">Apple Watch</option>
                        <option <?php if ($user->getFavorite() == 'Airpods'):?> selected<?php endif;?> value="Airpods">Airpods</option>
                        <option <?php if ($user->getFavorite() == 'iMac'):?> selected<?php endif;?> value="iMac">iMac</option>
                        <option <?php if ($user->getFavorite() == 'Macbook'):?> selected<?php endif;?> value="Macbook">Macbook</option>
                    </select>
                    
                    <div class="users__list-item image">
                        <img src="<?=$user->getImage();?>" alt="">
                    </div> 

                    <div class="users__list-item delete">
                        <span data-id=<?=$user->getId()?> class="btn btn-danger js-delete-record">
                            Delete
                        </span>
                    </div>
                </div>
            <?php endforeach;?>
            
        </div>

        <div class="users__button-container">
            <span class="users__button btn btn-success js-save-changes me-4">
                Save changes
            </span>
            <a href="/add/" class="users__button btn btn-primary">
                Add new User
            </a>
        </div>
    </div>
</div>
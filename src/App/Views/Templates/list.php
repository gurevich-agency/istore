<?php
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
            <div class="users__body-row">
                <div class="users__list-item name">
                    Customer name 1
                </div>
                <div class="users__list-item type">
                    Customer type 1
                </div>
                <div class="users__list-item phone">
                    Phone 1
                </div>
                <div class="users__list-item email">
                    Email 1
                </div>
                <div class="users__list-item address">
                    Address 1
                </div>
                <div class="users__list-item gender">
                    Gender 1
                </div>
                <div class="users__list-item favorite">
                    Favorite 1
                </div>
                <div class="users__list-item image">
                    Image 1
                </div> 
            </div>
            <div class="users__body-row">
                <div class="users__list-item name">
                    Customer name 2
                </div>
                <div class="users__list-item type">
                    Customer type 2
                </div>
                <div class="users__list-item phone">
                    Phone 2
                </div>
                <div class="users__list-item email">
                    Email 2
                </div>
                <div class="users__list-item address">
                    Address 2
                </div>
                <div class="users__list-item gender">
                    Gender 2
                </div>
                <div class="users__list-item favorite">
                    Favorite 2
                </div>
                <div class="users__list-item image">
                    Image 2
                </div> 
            </div>
        </div>

        <div class="users__button-container">
            <a href="/add/" class="users__button btn btn-primary">
                Add new User
            </a>
        </div>
    </div>
</div>
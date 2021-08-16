<?php

namespace App\Db;

class User
{
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;    
    protected $usertype;
    protected $phone;
    protected $email;
    protected $address;
    protected $gender;
    protected $favorite;
    protected $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUsertype(): string
    {
        return $this->usertype;
    }

    public function setUsertype(string $usertype): void
    {
        $this->usertype = $usertype;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getPhone(){
        return $this->phone;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getGender(){
        return $this->gender;
    }

    public function setFavorite($favorite){
        $this->favorite = $favorite;
    }
    public function getFavorite(){
        return $this->favorite;
    }

    public function setImage($image){
        $this->image = $image;
    }
    public function getImage(){
        return $this->image;
    }

}
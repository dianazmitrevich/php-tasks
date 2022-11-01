<?php

namespace app\controllers;

use app\models\User;

class AddController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function main()
    {
        var_dump($_SERVER['REQUEST_METHOD']);
        require_once 'views/add.php';
    }

     public function add(array $params = [])
     {
         if (isset($_POST['add-user'])) {
             $this->user->setEmail($_POST['email']);
             $this->user->setName($_POST['name']);
             $this->user->setGender($_POST['gender']);
             $this->user->setStatus($_POST['status']);

             $this->user->create('Data', $this->user->toArray());
             header('Location: /view');
             exit();
         }

         header('Location: /');
     }
}

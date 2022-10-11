<?php

namespace app\controllers;

use app\models\User;

class Controller
{
    public function main()
    {
        require_once 'views/add.php';
    }

    public function add(array $params)
    {
        if (!$params) {
            require_once 'views/add.php';
            exit;
        }

        if (isset($_POST['add-user'])) {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setName($_POST['name']);
            $user->setGender($_POST['gender']);
            $user->setStatus($_POST['status']);

            $user->create('Data', $user->toArray());
            header('Location: /view');
            exit();
        }
    }

    public function view(array $params)
    {
        if (!$params) {
            require_once 'views/view.php';
            exit;
        }

        if (isset($params['id'])) {
            $id = $params['id'];
            (new User())->delete('Data', $id);

            header('Location: /view');
            exit();
        }
    }

    public function edit(array $params)
    {
        if ($params) {
            if (isset($params['id'])) {
                $id = $params['id'];
                $user = (new User())->getById('Data', $id);
            }

            if (isset($_POST['update-user'])) {
                $user = new User();
                $user->setId($params['id']);
                $user->setEmail($_POST['email']);
                $user->setName($_POST['name']);
                $user->setGender($_POST['gender']);
                $user->setStatus($_POST['status']);
                $user->edit('Data', $user->getId(), $user->toArray());

                require 'views/view.php';
                exit();
            }

            require 'views/edit.php';
        }
    }
}

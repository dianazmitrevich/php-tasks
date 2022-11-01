<?php

namespace app\controllers;

use app\models\User;

class ViewController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function view(array $params = [])
    {
        if ($params) {
            $this->user->delete('Data', $params['id']);

            header('Location: /view');
            exit();
        }

        require_once 'views/view.php';
    }

    public function edit(array $params = [])
    {
        if ($params) {
            $user = $this->user->getById('Data', $params['id']);

            if (isset($_POST['update-user'])) {
                echo $this->user->getId();
                $this->user->setId($params['id']);
                $this->user->setEmail($_POST['email']);
                $this->user->setName($_POST['name']);
                $this->user->setGender($_POST['gender']);
                $this->user->setStatus($_POST['status']);
                $this->user->edit('Data', $this->user->getId(), $this->user->toArray());

                header('Location: /view');
                exit();
            }

            require_once 'views/edit.php';
        }

        header('Location: /');
    }

    public function readTable(string $table)
    {
        return $this->user->db->readTable($table);
    }
}

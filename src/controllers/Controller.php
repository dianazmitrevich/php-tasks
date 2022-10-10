<?php

namespace app\controllers;

use app\models\User;

class Controller
{
    public function main()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {
            case ($page === 'view'):
                require 'views/view.php';

                break;
            case ($page === 'add'):
                require 'views/add.php';

                break;
            case ($page === 'create'):
                if (isset($_POST['add-user'])) {
                    $user = new User();
                    $user->setEmail($_POST['email']);
                    $user->setName($_POST['name']);
                    $user->setGender($_POST['gender']);
                    $user->setStatus($_POST['status']);

                    $status = $user->create('Data', $user->toArray());
                    header('Location: /index.php?page=view&success=' . (bool)$status);
                    exit();
                }

                require 'views/view.php';

                break;
            case ($page === 'delete'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $status = (new User())->delete('Data', $id);

                    header('Location: /index.php?page=view&success-del=' . (bool)$status);
                    exit();
                }
                require 'views/view.php';

                break;
            case ($page === 'edit'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $user = (new User())->getById('Data', $id);
                }
                require 'views/edit.php';

                break;
            case ($page === 'update'):
                if (isset($_POST['update-user'])) {
                    $user = new User();
                    $user->setId($_GET['id']);
                    $user->setEmail($_POST['email']);
                    $user->setName($_POST['name']);
                    $user->setGender($_POST['gender']);
                    $user->setStatus($_POST['status']);
                    $status = $user->edit('Data', $user->getId(), $user->toArray());

                    header('Location: /index.php?page=view&success-upd=' . (bool)$status . '&id=' . $user->getId());
                    exit();
                }
                require 'views/view.php';

                break;
        }
    }

    public function updateUser(User $user)
    {
        return $this->db->edit('Data', $user->getId(), $user->toArray());
    }
}

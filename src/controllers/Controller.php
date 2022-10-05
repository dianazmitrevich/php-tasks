<?php

class Controller
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

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

                    $status = $this->addUser($user);
                    header('Location: /index.php?page=view&success=' . (bool)$status);
                    exit();
                }

                require 'views/view.php';

                break;
            case ($page === 'delete'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $status = $this->db->delete('Data', $id);

                    header('Location: /index.php?page=view&success-del=' . (bool)$status);
                    exit();
                }
                require 'views/view.php';

                break;
            case ($page === 'edit'):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $user = $this->db->getById('Data', $id);
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
                    $status = $this->updateUser($user);

                    header('Location: /index.php?page=view&success-upd=' . (bool)$status . '&id=' . $user->getId());
                    exit();
                }
                require 'views/view.php';

                break;
        }
    }

    public function addUser(User $user)
    {
        return $this->db->create('Data', $user->toArray());
    }
    public function updateUser(User $user)
    {
        return $this->db->edit('Data', $user->getId(), $user->toArray());
    }
}

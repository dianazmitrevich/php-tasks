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

            case ($page === 'create-user'):
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
        }
    }

    public function addUser(User $user)
    {
        return $this->db->create('Data', $user->toArray());
    }
}

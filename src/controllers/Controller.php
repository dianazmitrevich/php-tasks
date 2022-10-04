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
        }
    }
}
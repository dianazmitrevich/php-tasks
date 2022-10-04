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
            case ($page === 'header'):
                require 'views/header.php';

                break;
            case ($page === 'footer'):
                require 'views/footer.php';

                break;
        }
    }
}

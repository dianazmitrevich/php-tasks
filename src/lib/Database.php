<?php

namespace app\lib;

class Database
{
    public $connection;

    public function __construct()
    {
        $config = require 'resources/config/config.php';
        $this->connection = mysqli_connect($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
    }

    public function readTable(string $table): array
    {
        $query = 'SELECT * FROM ' . $table;

        if ($result = $this->connection->query($query)) {
            $output = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $result ? $output : [];
    }
}

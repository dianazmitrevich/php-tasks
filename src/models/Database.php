<?php

class Database
{
    private $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function test()
    {
        $var = $this->connection->query('SHOW tables;');
        var_dump($var);
    }
}

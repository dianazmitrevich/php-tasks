<?php

class Database
{
    private $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function readTable(string $table): array
    {
        $query = "insert into Data(id, email, name, gender, status) values(1, 'email' 'test', 'd', 'f', 'a')";
        $this->connection->query($query);
        $query = "insert into Data(id, email, name, gender, status) values(2, '2email' '2test', '2d', '2f', '2a')";
        $this->connection->query($query);

        $query = 'SELECT * FROM ' . $table;

        if ($result = $this->connection->query($query)) {
            $output = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $result ? $output : [];
    }
}
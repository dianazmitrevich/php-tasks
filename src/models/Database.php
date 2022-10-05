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
        $query = 'SELECT * FROM ' . $table;

        if ($result = $this->connection->query($query)) {
            $output = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $result ? $output : [];
    }

    public function getById(string $table, int $id)
    {
        $query = "SELECT * FROM $table WHERE id = $id";

        if ($result = $this->connection->query($query)) {
            $output = $result->fetch_assoc();
        }

        return $result ? $output : [];
    }

    public function create(string $table, array $data)
    {
        $keys = array_keys($data);
        array_splice($keys, 0, 1);
        $keysString = implode(', ', $keys);

        foreach ($data as $key => $value) {
            $valuesString[] = $value;
        }
        array_splice($valuesString, 0, 1);
        $valuesString = '\''.implode('\', \'', $valuesString).'\'';

        $query = "INSERT INTO $table($keysString) VALUES($valuesString)";
        $result = $this->connection->query($query);

        return $result;
    }

    public function delete(string $table, int $id)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->connection->query($query);

        return ($result);
    }

    public function edit(string $table, int $id, array $data)
    {
        array_splice($data, 0, 1);

        foreach ($data as $key => $value) {
            $values[] = $key.'=\''.$value.'\'';
        }
        $valuesString = implode(', ', $values);

        $query = "UPDATE $table SET $valuesString WHERE id = $id";
        $result = $this->connection->query($query);

        return $result;
    }
}

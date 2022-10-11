<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    private $id;
    private $email;
    private $name;
    private $gender;
    private $status;

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setGender(string $gender)
    {
        $this->gender = $gender;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'gender' => $this->gender,
            'status' => $this->status,
        ];
    }

    public function getById(string $table, int $id)
    {
        $query = "SELECT * FROM $table WHERE id = $id";

        if ($result = $this->db->connection->query($query)) {
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
        $result = $this->db->connection->query($query);

        return $result;
    }

    public function delete(string $table, int $id)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->db->connection->query($query);

        return $result;
    }

    public function edit(string $table, int $id, array $data)
    {
        array_splice($data, 0, 1);

        foreach ($data as $key => $value) {
            $values[] = $key.'=\''.$value.'\'';
        }
        $valuesString = implode(', ', $values);

        $query = "UPDATE $table SET $valuesString WHERE id = $id";
        $result = $this->db->connection->query($query);

        return $result;
    }
}

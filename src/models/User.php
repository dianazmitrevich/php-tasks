<?php

class User
{
    private $id;
    private $email;
    private $name;
    private $gender;
    private $status;

    public function __construct(array $userArr = [])
    {
        if (isset($userArr['id'])) {
            $this->id = $userArr['id'];
            $this->email = $userArr['email'];
            $this->name = $userArr['name'];
            $this->gender = $userArr['gender'];
            $this->status = $userArr['status'];
        }
    }

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
}

<?php

class User
{
    protected $userId;
    protected $fullName;
    protected $email;
    protected $role;
    protected $password;

    public function __construct(int $id, string $fullName, string $email, string $role, string $password)
    {
        $this->userId = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function __get($property)
    {
        return $this->$property;
    }
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

}

?>
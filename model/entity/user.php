<?php

class User
{
    protected $id;
    protected $fullName;
    protected $email;
    protected $role;
    protected $password;

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
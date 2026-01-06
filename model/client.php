<?php

class Client extends User
{
    private $isActive;
    
    public function __construct(int $id, string $fullName, string $email, string $role, string $password, int $isActive)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->isActive = $isActive;
    }

    public static function register (string $name, string $email, string $password): void
    {
        Database::request("INSERT INTO `users` (fullName, email, role, password) VALUES (?, ?, ?, ?)", [$name, $email, "client", $password]);
    }

}

?>
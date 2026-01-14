<?php

class ClientRepository
{
    public function insert (string $name, string $email, string $password): void
    {
        Database::request("INSERT INTO `users` (fullName, email, role, password) VALUES (?, ?, ?, ?)", [$name, $email, "client", $password]);
    }
}

?>
<?php

class UserRepository
{
    public function getByEmail(string $email): array
    {
        return Database::request("SELECT * FROM users WHERE email = ?", [$email]);
    }

    public function findById(int $id): array
    {
        return Database::request("SELECT * FROM users WHERE userId = ?", [$id]);
    }
}


?>
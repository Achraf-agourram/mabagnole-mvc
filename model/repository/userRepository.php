<?php

class UserRepository
{
    public function getByEmail($email): array
    {
        return Database::request("SELECT * FROM users WHERE email = ?", [$email]);
    }

    public function findById($id): array
    {
        return Database::request("SELECT * FROM users WHERE userId = ?", [$id]);
    }
}


?>
<?php

interface userServiceInterface
{
    public function login (string $email, string $password): ?User;

    public static function findById(int $id): ?User;
}

?>
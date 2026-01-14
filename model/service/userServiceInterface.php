<?php

interface UserServiceInterface
{
    public function login (string $email, string $password): ?User;

    public function findById(int $id): ?User;
}

?>
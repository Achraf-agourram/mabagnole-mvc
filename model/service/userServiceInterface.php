<?php

interface TserServiceInterface
{
    public function login (string $email, string $password): ?User;

    public static function findById(int $id): ?User;
}

?>
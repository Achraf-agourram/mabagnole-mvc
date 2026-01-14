<?php

interface clientServiceInterface
{
    public function register (string $name, string $email, string $password): void;
}

?>
<?php

interface ClientServiceInterface
{
    public function register (string $name, string $email, string $password): void;
}

?>
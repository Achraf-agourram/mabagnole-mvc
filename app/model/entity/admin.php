<?php

class Admin extends User
{
    public function __construct(int $id, string $fullName, string $email, string $role, string $password)
    {
        parent::__construct($id, $fullName, $email, $role, $password);
    }
}

?>
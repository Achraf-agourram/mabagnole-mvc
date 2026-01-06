<?php

class Admin extends User
{
    public function __construct(int $id, string $fullName, string $email, string $role, string $password)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }
}

?>
<?php

class Client extends User
{
    private $isActive;
    
    public function __construct(int $id, string $fullName, string $email, string $role, string $password, int $isActive)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->isActive = $isActive;
    }

}

?>
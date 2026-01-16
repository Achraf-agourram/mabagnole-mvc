<?php

class Client extends User
{
    private $isActive;
    
    public function __construct(int $id, string $fullName, string $email, string $role, string $password, int $isActive)
    {
        parent::__construct($id, $fullName, $email, $role, $password);
        $this->isActive = $isActive;
    }

}

?>
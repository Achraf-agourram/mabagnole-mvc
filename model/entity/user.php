<?php

class User
{
    protected $id;
    protected $fullName;
    protected $email;
    protected $role;
    protected $password;

    public function logout(): void
    {
        session_destroy();
    }

    public function __get($property)
    {
        return $this->$property;
    }
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

}

/*
    public static function login (string $email, string $password): ?User
    {
        $foundUser = Database::request("SELECT * FROM users WHERE email = ?", [$email]);

        if($foundUser)
        {
            $foundUser = $foundUser[0];
            if (password_verify($password, $foundUser->password)){
                $_SESSION['loggedAccount'] = $foundUser->userId;
                if($foundUser->role === 'client') return new Client($foundUser->userId, $foundUser->fullName, $foundUser->email, $foundUser->role, $foundUser->password, $foundUser->isActive);
                else if($foundUser->role === 'admin') return new Admin($foundUser->userId, $foundUser->fullName, $foundUser->email, $foundUser->role, $foundUser->password);
            }
            
        }

        return null;
    }

    public static function findById(int $id): ?User
    {
        $foundUser = Database::request("SELECT * FROM users WHERE userId = ?", [$id]);
        if($foundUser){
            $foundUser = $foundUser[0];
            if($foundUser->role === 'client') return new Client($foundUser->userId, $foundUser->fullName, $foundUser->email, $foundUser->role, $foundUser->password, $foundUser->isActive);
            else if($foundUser->role === 'admin') return new Admin($foundUser->userId, $foundUser->fullName, $foundUser->email, $foundUser->role, $foundUser->password);
        }
        return null;
    }
*/

?>
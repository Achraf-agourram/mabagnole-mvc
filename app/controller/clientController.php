<?php

class ClientController
{
    private ClientServiceInterface $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    public function registerPage (): void
    {
        require_once __DIR__ . "/../view/register.php";
        return;
    }

    public function register (): void
    {
        $fullName = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->clientService->register($fullName, $email, $password)) {
            echo "registred successfully !";
            
        }
        else echo "<script>alert('failed, try again please')</script>";

        require_once __DIR__ . "/../view/register.php";
        return;
    }
}

?>
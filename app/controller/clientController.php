<?php

class ClientController
{
    private ClientServiceInterface $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    public function register (): void
    {
        $fullName = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->clientService->register($fullName, $email, $password)) echo "registred successfully !";
        else echo "failed, try again please";
    }
}

?>
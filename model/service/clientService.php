<?php

class ClientService implements ClientServiceInterface
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function register(string $name, string $email, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try
        {
            $this->clientRepository->insert($name, $email, $hashedPassword);
            return true;
        }
        catch (Exception $er)
        {
            return false;
        }
        
    }
}

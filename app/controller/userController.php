<?php

class UserController
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function loginPage (): void
    {
        require_once __DIR__ . "/../view/login.php";
        return;
    }

    public function login (): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $connectedUser = $this->userService->login($email, $password);
        if($connectedUser)
        {
            $_SESSION['loggedAccount'] = $connectedUser->userId;
            echo "logged successfully";
            if ($connectedUser->role === 'admin') header('Location: categories');
            else header('Location: blog');
        }
        else {
            echo "<script>alert('please enter valid details')</script>";
            header('Location: login');
        }
        exit;
    }

    public function checkAccess (?string $roleToCheck, string $redirectPage): void
    {
        if (!isset($_SESSION['loggedAccount']))
        {
            header("location: /login");
            exit;
        }

        if (!$roleToCheck) header("location: /{$redirectPage}");
        else
        {
            $connectedUser = $this->userService->findById($_SESSION['loggedAccount']);

            if ($connectedUser->role === $roleToCheck) header("location: /{$redirectPage}");
            else header("location: /login");
        }

        exit;
    }
}

?>
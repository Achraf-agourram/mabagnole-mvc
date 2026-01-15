<?php

class UserService implements UserServiceInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password): ?User
    {
        $result = $this->userRepository->getByEmail($email);

        if (!$result) {
            return null;
        }

        $user = $result[0];

        if (!password_verify($password, $user->password)) {
            return null;
        }

        $_SESSION['loggedAccount'] = $user->userId;

        if ($user->role === 'client') return new Client($user->userId, $user->fullName, $user->email, $user->role, $user->password, $user->isActive);

        if ($user->role === 'admin') return new Admin($user->userId, $user->fullName, $user->email, $user->role, $user->password);

        return null;
    }

    public function findById(int $id): ?User
    {
        $result = $this->userRepository->findById($id);

        if (!$result) {
            return null;
        }

        $user = $result[0];

        if ($user->role === 'client') return new Client($user->userId, $user->fullName, $user->email, $user->role, $user->password, $user->isActive);

        if ($user->role === 'admin') return new Admin($user->userId, $user->fullName, $user->email, $user->role, $user->password);

        return null;
    }
}

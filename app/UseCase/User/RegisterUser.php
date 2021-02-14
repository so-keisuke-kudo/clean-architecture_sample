<?php

namespace App\UseCase\User;

use Domain\Entities\UserEntity;
use Domain\Exceptions\InvariantException;
use Domain\Repositories\UserRepositoryInterface;
use Domain\ValueObjects\UserAddress;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserName;

final class RegisterUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $userName
     * @param string $email
     * @param string $address
     * @throws InvariantException
     */
    public function execute(string $userName, string $email, string $address): void
    {
        $this->userRepository->create(
            new UserEntity(
                new UserName($userName),
                new UserEmail($email),
                new UserAddress($address)
            )
        );
    }
}

<?php

namespace App\Infrastructure\User;

use App\Models\User;
use Domain\Entities\UserEntity;
use Domain\Repositories\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function create(UserEntity $entity): int
    {
        $user = User::create(
            [
                'name' => $entity->userName->get(),
                'email' => $entity->userEmail->get(),
                'address' => $entity->address->get(),
            ]
        );

        return $user->id;
    }
}

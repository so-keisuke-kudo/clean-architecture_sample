<?php

namespace Domain\Repositories;

use Domain\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function create(UserEntity $entity);
}

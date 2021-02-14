<?php

namespace Domain\Entities;

use Domain\ValueObjects\UserAddress;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserName;

/**
 * @property-read UserName $userName
 * @property-read UserEmail $userEmail
 * @property-read UserAddress $address
 *
 * Class UserEntity
 * @package Domain\Entities
 */
final class UserEntity
{
    use Entity;

    protected UserName $userName;
    protected UserEmail $userEmail;
    protected UserAddress $address;

    public function __construct(UserName $userName, UserEmail $userEmail, UserAddress $address)
    {
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->address = $address;
    }
}

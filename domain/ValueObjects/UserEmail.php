<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvariantException;

final class UserEmail
{
    use ValueObjectString;

    /**
     * UserEmail constructor.
     * @param string $userEmail
     * @throws InvariantException
     */
    public function __construct(string $userEmail)
    {
        $userEmail = trim($userEmail);
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvariantException("Invalid user email: $userEmail");
        }
        $this->value = $userEmail;
    }
}

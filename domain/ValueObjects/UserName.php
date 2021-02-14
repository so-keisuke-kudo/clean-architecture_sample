<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\InvariantException;

final class UserName implements ValueObjectInterface
{
    use ValueObjectString;

    /**
     * UserName constructor.
     * @param string $value
     * @throws InvariantException
     */
    public function __construct(string $value)
    {
        $value = trim($value);
        if ($value === '') {
            throw new InvariantException("Invalid user name: $value");
        }
        $this->value = $value;
    }
}

<?php

namespace Domain\ValueObjects;

trait ValueObjectString
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function get(): string
    {
        return $this->value;
    }
}

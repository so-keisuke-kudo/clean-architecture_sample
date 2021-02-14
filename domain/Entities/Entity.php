<?php

namespace Domain\Entities;

trait Entity
{
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (method_exists(get_class($this), $name)) {
            return $this::$name();
        }
        return $this->$name;
    }

    public function __set($name, $value)
    {
        throw new \BadMethodCallException('Setter is not available.');
    }

    public function __isset($name): bool
    {
        $property = $this->__get($name);
        return isset($property);
    }

    public function __unset($name)
    {
        throw new \BadMethodCallException('Unset is not available.');
    }
}

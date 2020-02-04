<?php

namespace DENIOS\Inheritance\Test;

interface NameableInterface
{
    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getName(): string;
}
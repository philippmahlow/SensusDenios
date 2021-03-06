<?php

namespace DENIOS\Inheritance\Test;

class Test extends AbstractTest implements NameableInterface
{
    /**
     * @var string
     */
    protected $name;

    public function sayHello()
    {
        parent::sayHello();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}

$tes = new Test();

$tes->sayHello();
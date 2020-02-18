<?php

namespace App\Service;

class Test
{
    /**
     * @var Test2
     */
    private $test2;

    /**
     * Test constructor.
     * @param Test2 $test2
     */
    public function __construct(Test2 $test2)
    {
        $this->test2 = $test2;
    }


    public function test(): string
    {
        return 'test ' . $this->test2->test();
    }
}
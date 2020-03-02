<?php

namespace App\Service;

class MathService
{
    /**
     * @var MaxService
     */
    protected $maxService;

    /**
     * MathService constructor.
     * @param MaxService $maxService
     */
    public function __construct(MaxService $maxService)
    {
        $this->maxService = $maxService;
    }


    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function substract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function subsctractToZero(float $a, float $b): float
    {
        return $this->maxService->max(0, $this->substract($a, $b));
    }

    /**
     * @param float $a
     * @param float $b
     * @return float
     * @throws \InvalidArgumentException
     */
    public function substractToZeroWithException(float $a, float $b): float
    {
        if ($b > $a) {
            throw new \InvalidArgumentException('Result would be smaller than zero');
        }

        return $this->substract($a, $b);
    }

    public function getRandomNumber(int $min, int $max): int
    {
        return rand($min, $max+10);
    }


}
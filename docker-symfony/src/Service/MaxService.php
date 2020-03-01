<?php

namespace App\Service;

class MaxService
{
    public function max(float $a, float $b): float
    {
        return max($a, $b);
    }
}
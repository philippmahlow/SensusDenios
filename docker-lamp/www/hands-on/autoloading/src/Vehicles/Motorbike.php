<?php

namespace DENIOS\Vehicles;

class Motorbike extends MotorizedVehicle implements WheelieInterface
{
    CONST GAS_AMOUNT_PER_DRIVE = 1;

    protected $wheels = 2;

    /**
     * @return float
     */
    public function getMaxWheelieLength(): float
    {
        return 100.00;
    }
}
<?php

namespace DENIOS\Vehicles;

abstract class MotorizedVehicle extends Vehicle
{
    CONST GAS_AMOUNT_PER_DRIVE = 3;

    /**
     * @var float
     */
    protected $gasAmount;

    /**
     * Vehicle constructor.
     * @param string $color
     * @param int $wheels
     * @throws \Exception
     */
    public function __construct(string $color, int $wheels, float $gasAmount = 0.0)
    {
        $this->gasAmount = $gasAmount;
        parent::__construct($color, $wheels);
    }

    /**
     * @return float
     */
    public function getGasAmount(): float
    {
        return $this->gasAmount;
    }

    /**
     * @param float $gasAmount
     * @throws \Exception
     */
    public function setGasAmount(float $gasAmount): void
    {
        if($gasAmount < 0) {
            throw new \Exception('Gas amount has to be positive');
        }

        $this->gasAmount = $gasAmount;
    }


    public function drive(Driver $driver): void
    {
        // implement method. The gas amount should be deducted by the defined amount per drive.
        $gasAmount = $this::GAS_AMOUNT_PER_DRIVE;

        if($driver->isFast()) {
            $gasAmount *= 2;
        }

        $this->setGasAmount($this->getGasAmount() - $gasAmount);
    }
}
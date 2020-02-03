<?php

class Car
{
    CONST GAS_AMOUNT_PER_DRIVE = 3;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var float
     */
    protected $gasAmount;

    /**
     * Car constructor.
     * @param string $color
     * @param float $gasAmount
     */
    public function __construct(string $color, float $gasAmount)
    {
        $this->color = $color;
        $this->gasAmount = $gasAmount;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
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
     */
    public function setGasAmount(float $gasAmount): void
    {
        $this->gasAmount = $gasAmount;
    }

    public function drive()
    {
        // implement method. The gas amount should be deducted by the defined amount per drive.
    }

}

$car = new Car('White', 30);

var_dump($car->getGasAmount());

$car->drive();

var_dump($car->getGasAmount());



// implement class Manufacturer and add Manufacturer to Car Class

// implement class Driver and add Driver as parameter to the drive method
// driver should have an impact on the required gas amount

<?php

namespace DENIOS\Vehicles;

use Exception;

abstract class Vehicle
{

    /**
     * @var string
     */
    protected $color;

    /**
     * @var int
     */
    protected $wheels;

    /**
     * Vehicle constructor.
     * @param string $color
     * @param int $wheels
     * @throws Exception
     */
    public function __construct(string $color, int $wheels)
    {
        $this->color = $color;
        $this->wheels = $wheels;
    }


    /**
     * @return int
     */
    public function getWheels(): int
    {
        return $this->wheels;
    }

    /**
     * @param int $wheels
     */
    public function setWheels(int $wheels): void
    {
        $this->wheels = $wheels;
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

    public abstract function drive(Driver $driver): void;

}
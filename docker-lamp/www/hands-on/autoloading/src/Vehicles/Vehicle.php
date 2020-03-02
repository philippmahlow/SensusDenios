<?php

namespace DENIOS\Vehicles;

use Exception;

/**
 * Class Vehicle
 * @package DENIOS\Vehicles
 * @author Philipp Mahlow <philipp.mahlow@sensus-media.de>
 *
 * This class represents a generic vehicle and offers generic methods.
 */
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
     * This function returns the total number of wheels.
     *
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
     * Sets the main color of the vehicle
     *
     * @param string $color This should be a nice Color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public abstract function drive(Driver $driver): void;

}
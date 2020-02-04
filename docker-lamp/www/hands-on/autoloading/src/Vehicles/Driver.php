<?php


namespace DENIOS\Vehicles;


class Driver
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $isFast;

    /**
     * @var int
     */
    protected $fitnessLevel;

    /**
     * Driver constructor.
     * @param string $name
     * @param bool $isFast
     */
    public function __construct(string $name, bool $isFast, int $fitnessLevel)
    {
        $this->name = $name;
        $this->isFast = $isFast;
        $this->fitnessLevel = $fitnessLevel;
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

    /**
     * @return bool
     */
    public function isFast(): bool
    {
        return $this->isFast;
    }

    /**
     * @param bool $isFast
     */
    public function setIsFast(bool $isFast): void
    {
        $this->isFast = $isFast;
    }

    /**
     * @return int
     */
    public function getFitnessLevel(): int
    {
        return $this->fitnessLevel;
    }

    /**
     * @param int $fitnessLevel
     */
    public function setFitnessLevel(int $fitnessLevel): void
    {
        $this->fitnessLevel = $fitnessLevel;
    }

    /**
     * @param float $intensityFactor
     */
    public function trainForFitnessLevel(float $intensityFactor)
    {
        $this->setFitnessLevel($this->getFitnessLevel() + ($intensityFactor / $this->getFitnessLevel()));
    }


}
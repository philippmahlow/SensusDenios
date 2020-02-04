<?php

namespace DENIOS\Vehicles;

class Bicycle extends Vehicle implements WheelieInterface
{
    CONST TYPE_CLASSIC_ROAD = 'classic_road';
    CONST TYPE_MOUNTAIN = 'mountain';
    CONST TYPE_GRAVEL = 'gravel';
    CONST TYPE_CITY = 'city';
    CONST TYPE_TREKKING = 'trekking';

    CONST BICLYCLE_TYPES = [
        self::TYPE_CLASSIC_ROAD,
        self::TYPE_MOUNTAIN,
        self::TYPE_GRAVEL,
        self::TYPE_CITY,
        self::TYPE_TREKKING
    ];

    /**
     * @var string
     */
    protected $type;

    /**
     * Vehicle constructor.
     * @param string $color
     * @param int $wheels
     * @throws \Exception
     */
    public function __construct(string $color, int $wheels, string $bycicleType = self::TYPE_CITY)
    {
        parent::__construct($color, $wheels);

        $this->validateBicycleType($bycicleType);

        $this->type = $bycicleType;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @throws \Exception
     */
    public function setType(string $type): void
    {
        $this->validateBicycleType($type);
        $this->type = $type;
    }


    /**
     * @param string $bycicleType
     * @throws BycicleValidationException
     */
    private function validateBicycleType(string $bycicleType): void
    {
        if (!in_array($bycicleType, self::BICLYCLE_TYPES)) {
            throw new BycicleValidationException('Bicycle Type "' . $bycicleType . '" is not valid.');
        }
    }

    /**
     * @inheritDoc
     */
    public function drive(Driver $driver): void
    {
        switch ($this->getType()) {
            case self::TYPE_CLASSIC_ROAD:
            case self::TYPE_MOUNTAIN:
            case self::TYPE_GRAVEL:
                $intensityFactor = 5;
                break;
            case self::TYPE_TREKKING;
                $intensityFactor = 3;
                break;
            default:
                $intensityFactor = 1;
                break;
        }

        $driver->trainForFitnessLevel($intensityFactor);
    }

    /**
     * @return float
     */
    public function getMaxWheelieLength(): float
    {
        return 27.75;
    }
}
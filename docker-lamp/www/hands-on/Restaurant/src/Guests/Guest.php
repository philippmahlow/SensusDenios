<?php


namespace DENIOS\Restaurant\Guests;


class Guest
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $isVegan;

    /**
     * @var bool
     */
    protected $isVegatarian;

    /**
     * @var bool
     */
    protected $glutenIntolerant;

    /**
     * @var bool
     */
    protected $dislikesPork;

    /**
     * @var bool
     */
    protected $dislikesFish;

    /**
     * Guest constructor.
     * @param string $name
     * @param bool $isVegan
     * @param bool $isVegatarian
     * @param bool $glutenIntolerant
     * @param bool $dislikesPork
     * @param bool $dislikesFish
     */
    public function __construct(string $name, bool $isVegan, bool $isVegatarian, bool $glutenIntolerant, bool $dislikesPork, bool $dislikesFish)
    {
        $this->name = $name;
        $this->isVegan = $isVegan;
        $this->isVegatarian = $isVegatarian;
        $this->glutenIntolerant = $glutenIntolerant;
        $this->dislikesPork = $dislikesPork;
        $this->dislikesFish = $dislikesFish;
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
    public function isVegan(): bool
    {
        return $this->isVegan;
    }

    /**
     * @param bool $isVegan
     */
    public function setIsVegan(bool $isVegan): void
    {
        $this->isVegan = $isVegan;
    }

    /**
     * @return bool
     */
    public function isVegatarian(): bool
    {
        return $this->isVegatarian;
    }

    /**
     * @param bool $isVegatarian
     */
    public function setIsVegatarian(bool $isVegatarian): void
    {
        $this->isVegatarian = $isVegatarian;
    }

    /**
     * @return bool
     */
    public function isGlutenIntolerant(): bool
    {
        return $this->glutenIntolerant;
    }

    /**
     * @param bool $glutenIntolerant
     */
    public function setGlutenIntolerant(bool $glutenIntolerant): void
    {
        $this->glutenIntolerant = $glutenIntolerant;
    }

    /**
     * @return bool
     */
    public function isDislikesPork(): bool
    {
        return $this->dislikesPork;
    }

    /**
     * @param bool $dislikesPork
     */
    public function setDislikesPork(bool $dislikesPork): void
    {
        $this->dislikesPork = $dislikesPork;
    }

    /**
     * @return bool
     */
    public function isDislikesFish(): bool
    {
        return $this->dislikesFish;
    }

    /**
     * @param bool $dislikesFish
     */
    public function setDislikesFish(bool $dislikesFish): void
    {
        $this->dislikesFish = $dislikesFish;
    }


}
<?php


namespace DENIOS\Restaurant\Dishes;


class Ingredient implements IngredientsContainerInterface
{

    /**
     * @var Ingredient[]
     */
    protected $ingredients;

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
    protected $isGlutenFree;

    /**
     * @var bool
     */
    protected $hasFish;

    /**
     * @var bool
     */
    protected $hasPork;

    /**
     * Ingredient constructor.
     * @param Ingredient[] $ingredients
     * @param bool $isVegan
     * @param bool $isVegatarian
     * @param bool $isGlutenFree
     * @param bool $hasFish
     * @param bool $hasPork
     */
    public function __construct(
        array $ingredients,
        bool $isVegan,
        bool $isVegatarian,
        bool $isGlutenFree,
        bool $hasFish,
        bool $hasPork
    ) {
        $this->ingredients = $ingredients;
        $this->isVegan = $isVegan;
        $this->isVegatarian = $isVegatarian;
        $this->isGlutenFree = $isGlutenFree;
        $this->hasFish = $hasFish;
        $this->hasPork = $hasPork;
    }

    /**
     * @return Ingredient[]
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param Ingredient[] $ingredients
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
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
    public function isGlutenFree(): bool
    {
        return $this->isGlutenFree;
    }

    /**
     * @param bool $isGlutenFree
     */
    public function setIsGlutenFree(bool $isGlutenFree): void
    {
        $this->isGlutenFree = $isGlutenFree;
    }

    /**
     * @return bool
     */
    public function isHasFish(): bool
    {
        return $this->hasFish;
    }

    /**
     * @param bool $hasFish
     */
    public function setHasFish(bool $hasFish): void
    {
        $this->hasFish = $hasFish;
    }

    /**
     * @return bool
     */
    public function isHasPork(): bool
    {
        return $this->hasPork;
    }

    /**
     * @param bool $hasPork
     */
    public function setHasPork(bool $hasPork): void
    {
        $this->hasPork = $hasPork;
    }




}
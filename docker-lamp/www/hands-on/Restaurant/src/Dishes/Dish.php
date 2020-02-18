<?php

namespace DENIOS\Restaurant\Dishes;

class Dish
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var array $ingredients
     */
    protected $ingredients;


    /**
     * Dish constructor.
     * @param array $dish
     */
    public function __construct(string $name, float $price,array $ingredients)
    {
        $this->name = $name;
        $this->price = $price;
        $this->ingredients = $ingredients;
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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Ingredient[]
     */
    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    public function isVegan(){
        foreach($this->getIngredients() as $ingredient) {
            if(!$ingredient->isVegan()) {
                return false;
            }
        }

        return true;
    }


}
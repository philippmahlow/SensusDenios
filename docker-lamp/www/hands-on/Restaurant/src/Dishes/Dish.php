<?php

namespace DENIOS\Restaurant\Dishes;

use DENIOS\Restaurant\Common\NameableTrait;

class Dish
{

    use IngredientTrait;
    use NameableTrait;

    /**
     * @var float
     */
    protected $price;


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


    public function isVegan(){
        foreach($this->getIngredients() as $ingredient) {
            if(!$ingredient->isVegan()) {
                return false;
            }
        }

        return true;
    }


}
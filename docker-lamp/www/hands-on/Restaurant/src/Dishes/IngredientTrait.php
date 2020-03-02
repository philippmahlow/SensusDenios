<?php

namespace DENIOS\Restaurant\Dishes;

trait IngredientTrait {

    /**
     * @var array $ingredients
     */
    protected $ingredients;


    /**
     * @return Ingredient[] | null
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

}
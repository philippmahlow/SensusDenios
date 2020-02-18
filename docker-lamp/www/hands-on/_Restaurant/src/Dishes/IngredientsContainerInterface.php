<?php

namespace DENIOS\Restaurant\Dishes;

interface IngredientsContainerInterface
{
    /**
     * @return Ingredient[]
     */
    public function getIngredients():array;
}
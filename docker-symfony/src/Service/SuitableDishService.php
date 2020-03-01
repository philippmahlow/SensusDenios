<?php


namespace App\Service;


use App\Entity\Guest;
use App\Entity\Dish;
use App\Entity\Ingredient;

class SuitableDishService
{

    /**
     * @var SuitableIngredientService
     */
    protected $suitableIngredientsService;

    /**
     * SuitableDishService constructor.
     * @param SuitableIngredientService $suitableIngredientsService
     */
    public function __construct(SuitableIngredientService $suitableIngredientsService)
    {
        $this->suitableIngredientsService = $suitableIngredientsService;
    }


    function isDishSuitable(Guest $customer, Dish $dish): bool
    {
        foreach ($dish->getIngredients() as $ingredient) {
            if (!$this->suitableIngredientsService->isIngredientSuitable($customer, $ingredient)) {
                return false;
            }
        }

        return true;
    }

}
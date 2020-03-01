<?php


namespace App\Service;


use App\Entity\Guest;
use App\Entity\Ingredient;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\PersistentCollection;

class SuitableIngredientService
{

    function isIngredientSuitable(Guest $guest, Ingredient $ingredient): bool
    {
        if (count($ingredient->getIngredients()) > 0) {
            foreach ($ingredient->getIngredients() as $innerIngredient) {
                if (!$this->isIngredientSuitable($guest, $innerIngredient)) {
                    return false;
                }
            }
        } else {
            if ($guest->getIsVegan() && !$ingredient->getIsVegan()) {
                return false;
            }

            if ($guest->getIsVegetarian() && !$ingredient->getIsVegetarian()) {
                return false;
            }

            if ($guest->getIsAvoidGluten() && $ingredient->getIsGluten()) {
                return false;
            }

            if ($guest->getIsAvoidFish() && $ingredient->getIsFish()) {
                return false;
            }

            if ($guest->getIsAvoidPork() && $ingredient->getIsPork()) {
                return false;
            }
        }

        return true;
    }

}
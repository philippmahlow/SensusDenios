<?php


namespace DENIOS\Restaurant\Menues;


use DENIOS\Restaurant\Dishes\Dish;
use DENIOS\Restaurant\Dishes\Ingredient;
use DENIOS\Restaurant\Dishes\IngredientsContainerInterface;

class Menu
{

    /**
     * @var string
     */
    protected $menueName;

    /**
     * @var array
     */
    protected $dishes;

    /**
     * Menu constructor.
     * @param string $menueName
     * @param array $dishes
     */
    public function __construct(string $menueName, array $dishes)
    {
        $this->menueName = $menueName;
        $this->dishes = $dishes;
    }

    /**
     * @return string
     */
    public function getMenueName(): string
    {
        return $this->menueName;
    }

    /**
     * @param string $menueName
     */
    public function setMenueName(string $menueName): void
    {
        $this->menueName = $menueName;
    }

    /**
     * @return array
     */
    public function getDishes(): array
    {
        return $this->dishes;
    }

    /**
     * @param array $dishes
     */
    public function setDishes(array $dishes): void
    {
        $this->dishes = $dishes;
    }

    protected function isVegan(IngredientsContainerInterface $ingredientsContainer)
    {
        if($ingredientsContainer instanceof Ingredient && !$ingredientsContainer->isVegan()) {
            return false;
        }

        foreach($ingredientsContainer->getIngredients() as $ingredient) {
            if(!$this->isVegan($ingredient)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param \DENIOS\Restaurant\Guests\Guest $guest
     * @return Dish[]
     */
    public function getSuitableDishes(\DENIOS\Restaurant\Guests\Guest $guest): array
    {
        $eatable = [];

        foreach ($this->getDishes() as $dish) {
            if ($guest->isVegan() && !$dish->isVegan()) {
                continue;
            }

            if ($guest->isVegatarian() && !$dish->isVegatarian()) {
                continue;
            }

            if ($guest->isGlutenIntolerant() && $dish->isGlutenFree()) {
                continue;
            }

            if ($guest->isDislikesFish() && $dish->isHasFish()) {
                continue;
            }

            if ($guest->isDislikesPork() && $dish->isHasPork()) {
                continue;
            }

            $eatable[] = $dish;

        }

        return $eatable;

    }


}
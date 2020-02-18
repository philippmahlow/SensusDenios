<?php


namespace DENIOS\Restaurant\Menues;


use DENIOS\Restaurant\Dishes\Dish;

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


    /**
     * @param \DENIOS\Restaurant\Guests\Guest $guest
     * @return Dish[]
     */
    public function getSuitableDishes(\DENIOS\Restaurant\Guests\Guest $guest) : array {
        $eatable = [];

        foreach($this->getDishes() as $dish) {

            $ingredients = $dish->getIngredients();

            //TRUE ODER FALSE
            $isEatable = $this->checkIngredients($guest,$ingredients);

            var_dump($isEatable);
            if($isEatable){
                $eatable[] = $dish;
            }

        }
        return $eatable;

    }


    function checkIngredients($guest,$ingredients) {
        $isEatable = true;

        foreach ($ingredients as $ingredient) {
            if($ingredient->getAdditionalIngredients() !== null) {
                $isEatable = $this->checkIngredients($guest, $ingredient->getAdditionalIngredients());
            }

            if($guest->isVegan() && !$ingredient->isVegan()){
                return false;
            }

            if($guest->isVegatarian() && !$ingredient->isVegatarian()){
                return false;
            }

            if($guest->isGlutenIntolerant() && !$ingredient->isGlutenFree()) {
                return false;
            }

            if($guest->isDislikesFish() && !$ingredient->isHasFish()) {
                return false;
            }

            if($guest->isDislikesPork() && !$ingredient->isHasPork()) {
                return false;
            }
        }

        return $isEatable;
    }


}
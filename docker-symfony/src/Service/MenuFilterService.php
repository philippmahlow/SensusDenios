<?php


namespace App\Service;


use App\Entity\Guest;
use App\Entity\Dish;
use App\Entity\Menu;

class MenuFilterService
{

    /**
     * @var SuitableDishService
     */
    protected $suitableDishService;

    /**
     * MenuFilterService constructor.
     * @param SuitableDishService $suitableDishService
     */
    public function __construct(SuitableDishService $suitableDishService)
    {
        $this->suitableDishService = $suitableDishService;
    }


    /**
     * @param Guest $guest
     * @param Menu $menu
     * @return Dish[]
     */
    function filterMenu(Guest $guest, Menu $menu): array
    {
        $dishes = $menu->getDishes();

        $eatableDishes = [];

        foreach ($dishes as $dish) {
            $isEatable = $this->suitableDishService->isDishSuitable($guest, $dish);

            if ($isEatable) {
                $eatableDishes[] = $dish;
            }
        }

        return $eatableDishes;
    }

}
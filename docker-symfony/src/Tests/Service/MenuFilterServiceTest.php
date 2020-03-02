<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MenuFilterServiceTest extends TestCase
{
    /**
     * @var \App\Service\MenuFilterService
     */
    protected $sut;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\App\Service\SuitableDishService
     */
    protected $suitableDishService;


    protected function setUp(): void
    {
        $this->suitableDishService = $this
            ->getMockBuilder(\App\Service\SuitableDishService::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->sut = new \App\Service\MenuFilterService($this->suitableDishService);
    }


    public function testNotSuitableDishIsFilteredOut()
    {
        $menu = new \App\Entity\Menu();
        $dish = new \App\Entity\Dish();
        $dish1 = new \App\Entity\Dish();
        $dish2 = new \App\Entity\Dish();
        $guest = new \App\Entity\Guest();
        $menu->setDishes(new \Doctrine\Common\Collections\ArrayCollection([$dish, $dish1, $dish2]));

        $this->suitableDishService->expects($this->any())
             ->method('isDishSuitable')
             ->willReturnMap([
                 [$guest, $dish, false],
                 [$guest, $dish1, true],
                 [$guest, $dish2, true]
             ]);

        $filtered = $this->sut->filterMenu($guest,$menu);

        $this->assertCount(2, $filtered);
        $this->assertEqualsCanonicalizing(
            [$dish1, $dish2],
            $filtered
        );
    }


    public function testNotSuitableDishIsEmptyOnNoSuitableDishes()
    {
        $menu = new \App\Entity\Menu();
        $dish = new \App\Entity\Dish();
        $dish1 = new \App\Entity\Dish();
        $dish2 = new \App\Entity\Dish();
        $guest = new \App\Entity\Guest();
        $menu->setDishes(new \Doctrine\Common\Collections\ArrayCollection([$dish, $dish1, $dish2]));

        $this->suitableDishService->expects($this->any())
            ->method('isDishSuitable')
            ->willReturn(false);

        $filtered = $this->sut->filterMenu($guest,$menu);

        $this->assertCount(0, $filtered);
    }


}

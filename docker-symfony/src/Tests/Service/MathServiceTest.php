<?php

declare(strict_types=1);

use App\Service\MathService;
use PHPUnit\Framework\TestCase;

final class MathServiceTest extends TestCase
{
    /**
     * @var MathService
     */
    protected $sut;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\App\Service\MaxService
     */
    protected $maxService;

    protected function setUp(): void
    {
        $this->maxService = $this->getMockBuilder(\App\Service\MaxService::class)->getMock();
        $this->maxService->expects($this->any())
            ->method('max')
            ->willReturnCallback(function($a, $b){
                return max($a, $b);
            });

        $this->sut = new MathService($this->maxService);
    }

    public function testSubsctractToZeroIsZero(): void
    {
        $this->assertEquals(
            0,
            $this->sut->subsctractToZero(2, 5)
        );
    }

    public function testSubsctractToZero(): void
    {
        $this->assertEquals(
            1,
            $this->sut->subsctractToZero(6, 5)
        );
    }

    public function testSubsctractToZeroException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->sut->substractToZeroWithException(2, 3);
    }

    public function testGetRandomNumber(): void
    {
        $random = $this->sut->getRandomNumber(5, 20);

        $this->assertLessThanOrEqual(
            20,
            $random
        );

        $this->assertGreaterThanOrEqual(
            5,
            $random
        );
    }
}

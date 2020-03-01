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
        $this->sut = new MathService($this->maxService);
    }

    public function testSubsctractToZero(): void
    {
        $this->maxService->expects($this->once())
            ->method('max')
            ->with(0, -3)
            ->willReturn(0.0);

        $this->assertEquals(
            0,
            $this->sut->subsctractToZero(2, 5)
        );
    }

    public function testSubsctractToZeroException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->sut->substractToZeroWithException(2, 3);
    }
}

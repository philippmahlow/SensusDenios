<?php

declare(strict_types=1);

use App\Service\MathService;
use PHPUnit\Framework\TestCase;

final class RandomTest extends TestCase
{
    /**
     * @var GuzzleHttp\Client
     */
    protected $guzzleClient;


    protected function setUp(): void
    {
        $this->guzzleClient = new GuzzleHttp\Client([
            'base_uri' => 'https://api.chucknorris.io/'
        ]);
    }

    public function testRandomJokeWorks()
    {
        $response = $this->guzzleClient->get('jokes/random');
        $jsonString = $response->getBody()->getContents();

        $this->assertEquals(200, $response->getStatusCode());

        $joke = json_decode($jsonString, true);

        $this->assertIsArray($joke);
        $this->assertArrayHasKey('value', $joke);
        $this->assertGreaterThan(5, strlen($joke['value']));
    }


}

<?php
declare(strict_types=1);
use DENIOS\Vehicles\Bicycle;
use DENIOS\Vehicles\Car;
use DENIOS\Vehicles\Motorbike;
use DENIOS\Vehicles\Vehicle;
use DENIOS\Vehicles\WheelieInterface;

require_once 'vendor/autoload.php';

try {
    new Bicycle('Black', 2, 'e-bike');
} catch (\DENIOS\Vehicles\BycicleValidationException $ex) {
    echo 'TEST';
} catch (\Exception $ex) {
    var_dump($ex->getMessage());
}


$driver = new \DENIOS\Vehicles\Driver('Philipp', true, 5);

/** @var Vehicle[] $vehicles */
$vehicles = [
    //new Car('White', 4, 10),
    new Motorbike('Red', 2, 10),
    //new Bicycle('Black', 2, Bicycle::TYPE_CLASSIC_ROAD)
];

function getRandomVehicle(array $vehicles): Vehicle
{
    return $vehicles[rand(0, count($vehicles) - 1)];
}

function getRandomWheelieVehicle(array $vehicles): Vehicle
{
    shuffle($vehicles);
    foreach ($vehicles as $vehicle) {
        if($vehicle instanceof WheelieInterface) {
            return $vehicle;
        }
    }

    return NULL;
}

var_dump($driver);

$vehicle = getRandomVehicle($vehicles);

var_dump($vehicle);
$vehicle->drive($driver);
var_dump($vehicle);

var_dump($driver);
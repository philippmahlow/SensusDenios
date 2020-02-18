<?php
declare(strict_types=1);
use DENIOS\Vehicles\Bicycle;
use DENIOS\Vehicles\Car;
use DENIOS\Vehicles\Motorbike;
use DENIOS\Vehicles\Vehicle;
use DENIOS\Vehicles\WheelieInterface;

require_once 'vendor/autoload.php';

$db = new mysqli('mysql', 'root', 'tiger', 'docker');
$query = $db->query("SELECT * FROM car");

while($row = $query->fetch_assoc())
{
    var_dump($row);
}

$param = "BMW";
$statement = $db->prepare("
SELECT * 
FROM car c 
INNER JOIN model mo 
	ON mo.id = c.model_id 
INNER JOIN manufacturer ma 
	ON ma.id = mo.manufacturer_id 
WHERE ma.name LIKE ?
");
$statement->bind_param('s', $param);
$statement->execute();
$result = $statement->get_result();

var_dump($result->fetch_all());


die;


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
<?php





$amount = Car::getGasAmountForDrive();

$car2 = new Car('Black', 10);

$driver = new Driver('Philipp', true);

var_dump($car2->getGasAmount());
$car2->drive($driver);
/*
try {
    $car2->drive();
    $car2->drive();
    $car2->drive();
    $car2->drive();
} catch (\Exception $ex) {
    var_dump($ex->getMessage());
}
*/
/*
$car->drive();

var_dump($car->getGasAmount());
*/


// implement class Manufacturer and add Manufacturer to Car Class

// implement class Driver and add Driver as parameter to the drive method
// driver should have an impact on the required gas amount

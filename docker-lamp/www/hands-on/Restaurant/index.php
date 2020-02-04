<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

$db = new mysqli('mysql', 'root', 'tiger', 'docker');
$db->set_charset('utf8');

$query = $db->query("SELECT * FROM menu");

/** @var \DENIOS\Restaurant\Menues\Menu[] $menues */
$menues = [];

while($row = $query->fetch_assoc())
{
    $statement = $db->prepare("
        SELECT d.* 
        FROM dish d
        INNER JOIN menu_dish md
            ON md.dish_id = d.id AND md.menu_id = ?
    ");


    $statement->bind_param('i', $row['id']);


    $statement->execute();
    $result = $statement->get_result();

    $dishes = [];

    foreach($result as $dishRow) {
        $dishes[] = new \DENIOS\Restaurant\Dishes\Dish(
            $dishRow['name'],
            floatval($dishRow['price']),
            boolval($dishRow['vegan']),
            boolval($dishRow['vegetarian']),
            boolval($dishRow['contains_gluten']),
            boolval($dishRow['contains_fish']),
            boolval($dishRow['contains_pork'])
        );
    }


    $menue = new \DENIOS\Restaurant\Menues\Menu($row['name'], $dishes);
    $guest = new \DENIOS\Restaurant\Guests\Guest('Jannik',false,false,false,false,false);

    $menues[] = $menue;
}

die;
$guest = new \DENIOS\Restaurant\Guests\Guest('Jannik',false,true,false,false,false);

$dishes = [
    new \DENIOS\Restaurant\Dishes\Dish("Spagetti Bolognese",6.70,false,false,false,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Currywurst",2.80,false,false,false,false,true),
    new \DENIOS\Restaurant\Dishes\Dish("Fischbrötchen",1.30,false,true,false,true,false),
    new \DENIOS\Restaurant\Dishes\Dish("Grüner Salat mit Essig/Öl-Dressing",3.50,true,true,true,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Cheeseburger",6.70,false,false,false,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Soja-Burger",13.40,true,true,false,false,false),
];

$menues = new \DENIOS\Restaurant\Menues\Menu("EssensKarte",$dishes);

$suitableDishes = $menues->getSuitableDishes($guest);

var_dump($suitableDishes);

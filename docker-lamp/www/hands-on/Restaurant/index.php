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

    $menues[] = $menue;
}

$query = $db->query("SELECT * FROM guest");

$guests = [];
while($row = $query->fetch_assoc()) {
    $guests[] = new \DENIOS\Restaurant\Guests\Guest(
        intval($row['id']),
        $row['name'],
        boolval($row['isVegan']),
        boolval($row['isVegetarian']),
        boolval($row['avoidGluten']),
        boolval($row['avoidPork']),
        boolval($row['avoidFish']),
        floatval($row['money'])
    );
}

/** @var \DENIOS\Restaurant\Guests\Guest[] $dirtyGuests */
$dirtyGuests = [];

/** @var \DENIOS\Restaurant\Guests\Guest $guest */
foreach($guests as $guest) {
    echo 'Gast ' . $guest->getName() . '<br/>';
    foreach($menues as $menu) {
        echo 'Menü ' . $menu->getMenueName() . '<br/>';
        $suitableDishes = $menue->getSuitableDishes($guest);

        shuffle($suitableDishes);

        $dish = array_shift($suitableDishes);

        if($dish instanceof \DENIOS\Restaurant\Dishes\Dish) {
            echo 'Gast ' . $guest->getName() . ' isst ' . $dish->getName() . '<br/>';
            $guest->pay($dish->getPrice());
            $dirtyGuests[] = $guest;
        }
    }
}

foreach($dirtyGuests as $guest) {
    $statement = $db->prepare("
        UPDATE guest SET money = ? WHERE id = ?
    ");


    $statement->bind_param('di',
        $guest->getMoney(),
        $guest->getId());

    $statement->execute();
}

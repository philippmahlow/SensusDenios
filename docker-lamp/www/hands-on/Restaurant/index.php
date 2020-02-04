<?php

require __DIR__ . '/vendor/autoload.php';

$guest = new \DENIOS\Restaurant\Guests\Guest('Jannik',false,true,false,false,false);

$dishes = [
    new \DENIOS\Restaurant\Dishes\Dish("Spagetti Bolognese",6.70,false,false,false,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Currywurst",2.80,false,false,false,false,true),
    new \DENIOS\Restaurant\Dishes\Dish("Fischbrötchen",1.30,false,true,false,true,false),
    new \DENIOS\Restaurant\Dishes\Dish("Grüner Salat mit Essig/Öl-Dressing",3.50,true,true,true,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Cheeseburger",6.70,false,false,false,false,false),
    new \DENIOS\Restaurant\Dishes\Dish("Soja-Burger",13.40,true,true,false,false,false),
];

$menue = new \DENIOS\Restaurant\Menues\Menu("EssensKarte",$dishes);

$suitableDishes = $menue->getSuitableDishes($guest);

var_dump($suitableDishes);

<?php

$onlyVegetarian = false;
$onlyVegan = false;
$avoidGluten = false;
$avoidPork = false;
$avoidFish = true;

$dishes = [
    [
        'name' => 'Spaghetti Bolognese',
        'containsMeat' => true,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => true,
        'containsFish' => false
    ],
    [
        'name' => 'Fischbrötchen',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => true
    ],
    [
        'name' => 'Grüner Salat mit Essig/Öl-Dressing',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => false,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => false
    ],
    [
        'name' => 'Cheeseburger',
        'containsMeat' => true,
        'containsMilk' => true,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => true,
        'containsFish' => false
    ],
    [
        'name' => 'Soja-Burger',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => false
    ],
    [
        'name' => 'Currywurst',
        'containsMeat' => true,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => false,
        'containsPork' => true,
        'containsBeef' => false,
        'containsFish' => false
    ],
];


// implement a filter suitable dishes and echo names
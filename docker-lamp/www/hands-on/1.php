<?php

//boolean
$boolean = true;
$boolean = false;

//string
$string = "Lorem Ipsum";
$string = 'Lorem Ipsum';
$string = <<<EOF
    LOREM IPSUM
EOF;

$part = 'TEST';

echo $string . ' ' . $part . '<br/>';

echo "$string $part<br/>";

echo "\$string \$part<br/>";

echo '$string $part<br/>';

echo "Mein Name ist \"Peter\"<br/>";

echo 'Mein Name ist "Peter"<br/>';


//integer

$integer = 1;

echo 1 + 1 . '<br/>';
echo 2 - 1 . '<br/>';
echo 2 * 2 . '<br/>';
echo 6 / 2 . '<br/>';
echo 12 % 5 . '<br/>';

$integer = intval("4");


//float

$float = 23.99;

$float = floatval("23.99");

echo $float . "<br/>";
echo intval($float) . "<br/>";
echo floor($float) . "<br/>";
echo ceil($float) . "<br/>";

//arrays

$array = [
    'red',
    'green',
    'blue'
];

echo $array[1] . "<br/>";

$array2 = [
    'yellow',
    'pink'
];
var_dump($array2);

$array2[] = 'blue';
var_dump($array2);

$array2[1] = 'orange';
var_dump($array2);

var_dump(array_merge($array, $array2));

var_dump(array_intersect($array, $array2));

var_dump(array_diff($array, $array2));


//associative arrays

$assoc = [
    'blue' => 'dark',
    'yellow' => 'bright',
    'red' => 'bright',
    'green' => 'dark'
];

var_dump($assoc);
var_dump($assoc['blue']);

$assoc['green'] = 'dark';
var_dump($assoc);

$assoc['orange'] = 'bright';
var_dump($assoc);

// objects

$object = new \StdClass();
var_dump($object);
$object->color = 'green';
var_dump($object);

$key = 'color';
$value = 'red';

$object->{$key} = $value;

var_dump($object);
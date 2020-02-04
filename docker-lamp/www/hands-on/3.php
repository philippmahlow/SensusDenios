<?php

$string = "";

if (true) {
    var_dump('Ausdruck ist wahr');
}

if (false) {
    var_dump('Ausdruck ist wahr');
}else {
    var_dump('Ausdruck ist nicht wahr');
}

var_dump((true ? 10 : 50));


$color = 'red';

if ($color == 'green') {
    var_dump('Farbe ist grün');
} else {
    if ($color == 'yellow') {
        var_dump('Farbe ist gelb');
    } else {
        if ($color == 'blue') {
            var_dump('Farbe ist blau');
        } else {
            if ($color == 'red') {
                var_dump('Farbe ist rot');
            } else {
                var_dump('Farbe ist unbekannt');
            }
        }
    }
}


switch ($color) {
    case 'red':
    case 'green':
        var_dump('Farbe ist grün');
        break;
    case 'yellow':
        var_dump('Farbe ist gelb');
        break;
    default:
        var_dump('Farbe ist unbekannt');
        break;
}






$i = 0;
while ($i < 10) {
    var_dump('while 1: ' . $i);
    $i++;
}

$i = 11;
while ($i < 10) {
    var_dump('while 2: ' . $i);
    $i++;
}












$i = 0;
do {
    var_dump('do...while 1: ' . $i);
    $i++;
} while ($i < 10);

$i = 11;
do {
    var_dump('do...while 2: ' . $i);
    $i++;
} while ($i < 10);






$test = [
    0 => 'test1',
    1 => 'test2',
    2 => 'test3'
];




for ($i = 0; $i < count($test); $i++) {
    var_dump('for: ' . $test[$i]);
}
















$colors = [
    'red',
    'green',
    'yellow',
    'green'
];

foreach ($colors as $key => $value) {
    var_dump('foreach: ' . $value);
    $colors[$key] = 'test';
}

var_dump($colors);


<?php


function getNameableObject():\DENIOS\Inheritance\Test\NameableInterface
{
    //return new \DENIOS\Inheritance\Test\Test();
    return new \DENIOS\Inheritance\Test\AnotherDifferentTest();
}


$test = getNameableObject();
$test->setName('test');

var_dump($test->getName());



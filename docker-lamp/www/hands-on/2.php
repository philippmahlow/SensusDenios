<?php

var_dump(1 == 2); // false
var_dump(1 != 2); // true

var_dump(1 === 2);
var_dump(1 !== 2);

var_dump("2" == 2);
var_dump("2" === 2);
var_dump("2" != 2);
var_dump("2" !== 2);

var_dump(true == "2");
var_dump(true == "Lorem Ipsum");
var_dump(true === "2");
var_dump("2" == "Lorem Ipsum");

var_dump(true && false);
var_dump(true || false);

var_dump(!true);
var_dump(!false);

var_dump(true xor true);
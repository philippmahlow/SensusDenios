<?php

//5!

//5*4*3*2*1

function iteration(int $val){
    $result = 1;

    while($val > 0) {
        $result *= $val;
        $val--;
    }

    return $result;
}

function recursion(int $val)
{
    if($val < 1) {
        return 1;
    }
    return recursion($val - 1) * $val;
}

/*
3!
3*2!
3*2*1!
3*2*1*1
*/

var_dump(iteration(5));
var_dump(recursion(5));
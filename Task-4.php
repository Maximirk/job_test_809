<?php

/*Задача: Напишите функцию вычисления факториала числа.*/

function getFactorial(int $number) {
    //Вариант 1
    $result = 1;

    for ($i = 2; $i <= $number; $i++) {
        $result *= $i;
    }

    echo $result;

    //Вариант 2
    echo $number === 0 ? 1 : array_product(range(1, $number));
}

getFactorial(5);
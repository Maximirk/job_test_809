<?php

/*Задача: Задан ассоциативный массив на 10 элементов.
Напишите код для получения ключа первого элемента 3-мя разными способами.*/

$data = array(
    "a" => "one",
    "b" => "two",
    "c" => "three",
    "d" => "four",
    "e" => "five",
    "f" => "six",
    "g" => "seven",
    "h" => "eight",
    "i" => "nine",
    "j" => "ten"
);

//Способ 1
echo array_key_first($data); //начиная с php 7.3

//Способ 2
echo array_keys($data)[0];

//Способ 3
echo array_search(array_values($data)[0], $data);

<?php

$a = "0";
if (isset($a)){
    echo 0;
} else {
    echo 1;
}

if (empty($a)) {
    echo 0;
} else {
    echo 1;
}

if($a) {
    echo 0;
} else {
    echo 1;
}
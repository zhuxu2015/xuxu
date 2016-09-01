<?php

$con = file_get_contents("1.txt");
$con = str_replace(array('[',']','T','+08:00'), ['','',' ',''], $con);
$con = preg_split('/[\n\r]+/', $con);
print_r($con);

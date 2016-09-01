<?php

$hfjy_con = file_get_contents("http://www.hfjy.com/");
$hfjy_con = preg_replace('/<div\s+class=\"navbar-fixed-top\"([^>]+)?>.*<\/div>/isU', "", $hfjy_con);
$hfjy_con = preg_replace('/<div\s+id=\"banner\"([^>]+)?>.*<\/div>/isU', "", $hfjy_con);
print_r( $hfjy_con );
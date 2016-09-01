<?php

$file = fopen("nglog.txt","r");
while(! feof($file))
{
  $con = fgets($file);
 // $con = str_replace(array('[',']'), '', $con);
  $con = str_replace(array('[',']','T','+08:00'), ['','',' ',''], $con);
  $con = rtrim($con);
  if (isset($arr[$con])){
		$arr[$con] +=1;
	}else{
		$arr[$con] = 1;
	}
}
fclose($file);

arsort($arr);
$str = '';
foreach ($arr as $key => $value) {
	$str .= $key.'	'.$value."\n";
}
$f = fopen('ng.txt', 'w');
fwrite($f, $str);
fclose($f);
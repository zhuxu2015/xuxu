<?php

$file = fopen("nglog_2.txt","r");
while(! feof($file))
{
  $con = fgets($file);
  $con = str_replace(array('[',']','T','+08:00'), ['','',' ',''], $con);
  $con = rtrim($con);

  $ip_arr = explode(' ', $con);
  //$rep_ip = str_replace('.', '', $ip_arr[2]);
  
  if( isset($count_ip[$ip_arr[2]]) ) $count_ip[$ip_arr[2]] += 1;
  else $count_ip[$ip_arr[2]] = 1;

  if (isset($arr[$con])){
		$arr[$con] +=1;
	}else{
		$arr[$con] = 1;
	}
}
fclose($file);
//print_r($count_ip);
arsort($arr);
$str = '';
foreach ($arr as $key => $value) {
	$new_ip_arr = explode(' ', $key);
	$str .= $key.'	'.$value."	".$count_ip[$new_ip_arr[2]]."\n";
	//echo $str."<br>";
}
$f = fopen('ng_ip.txt', 'w');
fwrite($f, $str);
fclose($f);
<?php
header("Content-type: text/html; charset=UTF-8"); 
set_time_limit(0);
$connect = mysqli_connect('localhost','root','','test') or die('Unale to connect');
mysqli_query($connect,"set names 'utf8'");
//$id = $_GET['id'];
$school_sql = "select * from school_list";

$query = mysqli_query($connect, $school_sql);

while ($arr = mysqli_fetch_assoc($query) ) {
		
	/*$school_detail = "school_detail".$arr['id'];
	$create = "CREATE TABLE IF NOT EXISTS `".$school_detail."` (
	  `id` smallint(5) NOT NULL AUTO_INCREMENT,
	  `school_id` smallint(5) NOT NULL,
	  `city` char(20) NOT NULL,
	  `sc_name` varchar(100) NOT NULL,
	  `major_name` varchar(200) NOT NULL,
	  `sub_remedy` varchar(100) NOT NULL,
	  `note` varchar(300) NOT NULL,
	  `from` char(20) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	mysqli_query($connect, $create);*/

	$school_id = $arr['id'];
	$city = $arr['city'];
	$sc_name = $arr['name'];

	$str=file_get_contents($arr['link']);
	$str = mb_convert_encoding($str, "UTF-8", "GBK");
	preg_match_all('/<table[^>]*>(.*)<\/table>/isU',$str,$m);
	preg_match_all('/<tr[^>]*>(.*)<\/tr>/isU',$m[1][0],$ms);
	array_shift($ms[1]);
	$tr_arr=[];
	if($ms[1]){	
		foreach($ms[1] as $k=>$v){
		    preg_match_all('/<td[^>]*>(.*)<\/td>/isU',$v,$mss);
		    if( $mss[1] ){
		    	if(empty($tr_arr[$k][0])){
		        	$tr_arr[$k][0]=$mss[1][0];
			    }
			    if(empty($tr_arr[$k][1])){
			        $tr_arr[$k][1]=$mss[1][1];
			    }else{
			        $mss[1][2]=@$mss[1][1];
			    }
			    if(empty($tr_arr[$k][2])){
			        $tr_arr[$k][2]=@$mss[1][2];
			    }

			    foreach($mss[0] as $p=>$q){
			        $tt=preg_match_all('/rowspan="(\d)*"/isU',$q,$msss);
			        if($tt){
			            for($i=0;$i<$msss[1][0];$i++)
			            {
			                $tr_arr[$k+$i][$p]=$mss[1][$p];
			            }
			        }
			    }
			    //print_r($tr_arr[$k]);
			    foreach($tr_arr[$k] as $m=>&$n){
			        preg_match_all("/[\x80-\xff]+/",$n,$n_t);
			        if(!empty($n_t[0][0])){
			            $n=join('',$n_t[0]);
			        }else{
			            $n='';
			        }
			    }

			    if(empty($tr_arr[$k][0])){
			        $tr_arr[$k][0]=$tr_arr[$k][1];
			        $tr_arr[$k][1]=$tr_arr[$k][2];
			    }
			    
		    }else{
		    	echo $school_id.'!!!'.$sc_name;
		    }
		    
		}
		if( $tr_arr[0]){
			foreach ($tr_arr as $key => $value) {
				$sql = "insert into school_detail set school_id='".$school_id."',city='".$city."',sc_name='".$sc_name."',major_name='".$value[0]."',sub_remedy='".$value[1]."',note='".$value[2]."'";
				mysqli_query($connect,$sql);
				//echo $sql."<br>";
			}		
		}
	}else{
		echo $school_id.'!!!'.$sc_name;
	}
		
	}
//print_r($tmp_major);

?>
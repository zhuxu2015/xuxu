<?php
header("Content-type: text/html; charset=UTF-8"); 
set_time_limit(0);
$connect = mysqli_connect('localhost','root','','test') or die('Unale to connect');
mysqli_query($connect,"set names 'utf8'");
//$id = $_GET['id'];
$school_sql = "select * from school_list";

$query = mysqli_query($connect, $school_sql);

while ($arr = mysqli_fetch_assoc($query) ) {
		
	$school_id = $arr['id'];
	$city = $arr['city'];
	$sc_name = $arr['name'];

	$str=file_get_contents($arr['link']);
	$str = mb_convert_encoding($str, "UTF-8", "GBK");
	preg_match_all('/<tbody([^>]+)?>(.*)<\/tbody>/isU',$str,$m);
	
	if( strripos(@$m[2][0], 'rowspan="') ){
		echo $school_id.'!!!'.$sc_name;
	}else{
		preg_match_all('/<td([^>]+)?>(.*)<\/td>/isU',@$m[2][0],$ms);
		$new_arr=array_slice($ms[2],3,count($ms[2]));

		$tmp_arr=[];
		foreach($new_arr as $k=>$v){
			if( strripos($v,'div') || strripos($v,'font') || strripos($v,'p>') ){
				preg_match_all('/<font([^>]+)?>(.*)<\/font>/isU',$v,$v_t);	    
		    	if(!$v_t[0]) preg_match_all('/<div([^>]+)?>(.*)<\/div>/isU',$v,$v_t);
		    	if(!$v_t[0]) preg_match_all('/<p([^>]+)?>(.*)<\/p>/isU',$v,$v_t);
		    	
			}else{
				@$v_t[2][0] = $v;
			}

		    $tmp='';
		    foreach($v_t[2] as $p=>$q){
		    	$q = str_replace(array('<span>','</span>','<strong>','</strong>'), ' ', $q);
		        $tmp.=$q;
		    }
		    $tmp_arr[]=$tmp;
		}
		$tmp_major=[];
		for($i=0;$i<count($tmp_arr);$i++){
		    $flag=$i%3;
		    if($flag==0){
		        $tmp_major[floor($i/3)]['major_name']=$tmp_arr[$i];
		    }elseif($flag==1){
		        $tmp_major[floor($i/3)]['requested_subject']=$tmp_arr[$i];
		    }elseif($flag==2){
		        $tmp_major[floor($i/3)]['note']=$tmp_arr[$i];
		    }
		}

		if( @$tmp_major[0]['major_name'] ){
			foreach ($tmp_major as $key => $value) {
				$sql = "insert into school_detail set school_id='".$school_id."',city='".$city."',sc_name='".$sc_name."',major_name='".$value['major_name']."',sub_remedy='".$value['requested_subject']."',note='".$value['note']."'";
				mysqli_query($connect,$sql);
				//echo $sql."<br>";
			}
		}else{
			echo $school_id.'!!!'.$sc_name;
		}
	}
	
	
}
//print_r($tmp_major);

?>
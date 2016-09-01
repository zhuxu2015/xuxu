<?php
header("Content-type: text/html; charset=UTF-8"); 
set_time_limit(0);
$connect = mysqli_connect('localhost','root','','test') or die('Unale to connect');
mysqli_query($connect,"set names 'utf8'");
$id = $_GET['id'];
$school_sql = "select * from school_list id=$id";
$query = mysqli_query($connect, $school_sql);

while ($arr = mysqli_fetch_assoc($query) ) {
		
	$school_id = $arr['id'];
	$city = $arr['city'];
	$sc_name = $arr['name'];
	//$from = mb_convert_encoding('上海', "UTF-8", "GBK");
	/*$from = mb_convert_encoding('上海', "UTF-8", "GBK");
	//echo $school_id.'__'.$sc_name."<br>";
	preg_match_all('/\<tr\s+style=\"(.*)"\>\s+\<td\s+style=\"(.*)\"\>\s+\<p\s+style=\"(.*)\"\>\<font\s+size=\"2\"\>(.*)\<\/font\>\<\/p\>\s+\<\/td\>\s+\<td\s+style=\"(.*)"\>\s+\<p\s+style=\"(.*)"\>\<font\s+size=\"2\"\>(.*)\<\/font\>\<\/p\>\s+\<\/td\>\s+\<td\s+style=\"(.*)"\>\s+\<p\s+style=\"(.*)"\>\<font\s+size=\"2\"\>(.*)\<\/font\>\<\/p\>\s+\<\/td\>\s+\<\/tr\>.*?/', $con, $matches);*/

	$str=file_get_contents($arr['link']);
	$str = mb_convert_encoding($str, "UTF-8", "GBK");
	preg_match_all('/<tbody>(.*)<\/tbody>/isU',$str,$m);
	preg_match_all('/<td[^>]+>(.*)<\/td>/isU',$m[1][0],$ms);
	$new_arr=array_slice($ms[1],3,count($ms[1]));
	$tmp_arr=[];
	foreach($new_arr as $k=>$v){
	    preg_match_all('/<font[^>]+>(.*)<\/font>/isU',$v,$v_t);
	    $tmp='';
	    foreach($v_t[1] as $p=>$q){
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

	foreach ($tmp_major as $key => $value) {
		$sql = "insert into school_detail set school_id='".$school_id."',city='".$city."',sc_name='".$sc_name."',major_name='".$value['major_name']."',sub_remedy='".$value['requested_subject']."',note='".$value['note']."'";
		mysqli_query($connect,$sql);
		echo $sql."<br>";
	}
	    
	//p($tmp_major);

	
	/*if(@!$matches[10][0]){
		preg_match_all('/\<tr\>\s+\<td\s+(.*)\>\s+\<div\>(.*)\<\/div\>\s+\<\/td\>\s+\<td\s+(.*)\>\s+\<div\>(.*)\<\/div\>\s+\<\/td\>\s+\<td\s+(.*)\>\s+\<div\>(.*)\<\/div\>\s+\<\/td\>\s+\<\/tr\>.*?/', $con, $matches);
		if(@!$matches[2][0]){ echo $school_id.'__'.$sc_name."<br>"; }
		foreach ($matches[2] as $key => $value) {
			$major_name = $matches[2][$key];
			$sub_remedy = $matches[4][$key];
			$note = $matches[6][$key];
			
			$sql = "insert into school_detail set school_id='".$school_id."',city='".$city."',sc_name='".$sc_name."',major_name='".$major_name."',sub_remedy='".$sub_remedy."',note='".$note."'";
			mysqli_query($connect,$sql);
			//echo $sql;
		}
	}else{
		foreach ($matches[4] as $key => $value) {
			$major_name = $matches[4][$key];
			$sub_remedy = $matches[7][$key];
			$note = $matches[10][$key];
			$sql = "insert into school_detail set school_id='".$school_id."',city='".$city."',sc_name='".$sc_name."',major_name='".$major_name."',sub_remedy='".$sub_remedy."',note='".$note."'";
			mysqli_query($connect,$sql);
			//echo $sql;
		}
	}*/
	

}


//print_r($matches);

?>
<!-- <tr style="HEIGHT: 14.25pt">
    <td style="BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; PADDING-LEFT: 5.4pt; WIDTH: 148pt; PADDING-RIGHT: 5.4pt; VERTICAL-ALIGN: middle; BORDER-TOP: #000000 1px solid; BORDER-RIGHT: #000000 1px solid">
    <p style="TEXT-ALIGN: center; WIDOWS: 2; ORPHANS: 2"><font size="2">数学类</font></p>
    </td>
    <td style="BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; PADDING-LEFT: 5.4pt; WIDTH: 85pt; PADDING-RIGHT: 5.4pt; VERTICAL-ALIGN: middle; BORDER-TOP: #000000 1px solid; BORDER-RIGHT: #000000 1px solid">
    <p style="TEXT-ALIGN: center; WIDOWS: 2; ORPHANS: 2"><font size="2">物理</font></p>
    </td>
    <td style="BORDER-BOTTOM: #000000 1px solid; BORDER-LEFT: #000000 1px solid; PADDING-LEFT: 5.4pt; WIDTH: 191pt; PADDING-RIGHT: 5.4pt; VERTICAL-ALIGN: middle; BORDER-TOP: #000000 1px solid; BORDER-RIGHT: #000000 1px solid">
    <p style="TEXT-ALIGN: center; WIDOWS: 2; ORPHANS: 2"><font size="2">　</font></p>
    </td>
</tr> -->
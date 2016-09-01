<?php
header("Content-type: text/html; charset=utf-8");
$connect = mysqli_connect('localhost','root','','test') or die('Unale to connect');
mysqli_query($connect,"set names 'utf8'");

/*$sql = "select * from school";
$query = mysqli_query($connect, $sql);
while ($arr = mysqli_fetch_assoc($query) ) {
	$data['name']['title'] = $arr['sc_name'];
	$data['name']['url']   = $arr['sc_link'];

	$data['zhaosheng']['title'] = $arr['zh_name'];
	$data['zhaosheng']['url'] = $arr['zh_link'];
	$data['zhaosheng']['className'] = '';

	$data['zhengce']['title'] = $arr['zc_name'];
	$data['zhengce']['url'] = $arr['zc_link'];
	$data['zhengce']['className'] = '';

	$data['gonglue']['title'] = '报名攻略';
	$data['gonglue']['url'] = $arr['bmcl'];
	$data['gonglue']['className'] = '';

	$data['time']['title'] = '报名时间及入口:';
	$data['time']['date'] = $arr['bmrk'];

	$data['mianshi']['title'] = '面试时间:';
	$data['mianshi']['date'] = $arr['mssj'];
	
	$data['bishi']['title'] = '笔试时间:';
	$data['bishi']['date'] = $arr['bssj'];

	$school[$arr['city']][] = $data;
}

print_r(json_encode($school, JSON_UNESCAPED_UNICODE));*/
$city = @$_POST['city'];
$sc_name = @$_POST['sc_name'];
$sc_link = @$_POST['sc_link'];
/*$sc_color = @$_POST['sc_color'];
$zh_name = @$_POST['zh_name'];
$zh_link = @$_POST['zh_link'];
$zh_color = @$_POST['zh_color'];
$zc_name = @$_POST['zc_name'];
$zc_link = @$_POST['zc_link'];
$bmrk = @$_POST['bmrk'];
$bmcl = @$_POST['bmcl'];
$bssj = @$_POST['bssj'];
$mssj = @$_POST['mssj'];*/
$sc_link = 'http://www.shmec.gov.cn/web/jyzt/xkkm2017/'.$sc_link;
$sql = "insert into school_list set city='".$city."',name='".$sc_name."',link='".$sc_link."'";
/*$sql = "insert into school set city='".$city."',sc_name='".$sc_name."',sc_link='".$sc_link."',sc_color='".$sc_color."',zh_name='".$zh_name."',zh_link='".$zh_link."',zh_color='".$zh_color."',zc_name='".$zc_name."',zc_link='".$zc_link."',bmrk='".$bmrk."',bmcl='".$bmcl."',bssj='".$bssj."',mssj='".$mssj."'";*/
mysqli_query($connect,$sql);
echo $sql;

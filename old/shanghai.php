<?php
header("Content-Type: text/html; charset=GBK");
function p($str){
    echo "<pre>";
    print_r($str);
    exit;
}
function v($str){
    echo "<pre>";
    print_r($str);
}
$url="http://www.shmec.gov.cn/web/jyzt/xkkm2017/detail.php?article_id=79609&area_id=3316";
//$url="http://www.shmec.gov.cn/web/jyzt/xkkm2017/detail.php?article_id=79623&area_id=3293";
/*$url="http://www.shmec.gov.cn/web/jyzt/xkkm2017/detail.php?article_id=79257&area_id=3288";
$url="http://www.shmec.gov.cn/web/jyzt/xkkm2017/detail.php?article_id=79667&area_id=3289";
$url="http://www.shmec.gov.cn/web/jyzt/xkkm2017/detail.php?article_id=79735&area_id=3289";*/
$str=file_get_contents($url);
preg_match_all('/<tbody([^>]+)?>(.*)<\/tbody>/isU',$str,$m);
print_r($m);exit;
preg_match_all('/<tr([^>]+)?>(.*)<\/tr>/isU',$m[2][0],$ms);
array_shift($ms[2]);
$tr_arr=[];
foreach($ms[2] as $k=>$v){
    preg_match_all('/<td([^>]+)?>(.*)<\/td>/isU',$v,$mss);

    if(empty($tr_arr[$k][0])){
        $tr_arr[$k][0]=$mss[2][0];
    }
    if(empty($tr_arr[$k][1])){
        $tr_arr[$k][1]=$mss[2][1];
    }else{
        $mss[2][2]=@$mss[2][1];
    }
    if(empty($tr_arr[$k][2])){
        $tr_arr[$k][2]=@$mss[2][2];
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

}

p($tr_arr);


?>
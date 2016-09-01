<?php
 
    $img = $_POST['base64_string'];
    $md5 = md5_file($img);
    $path = 'images/';
     
    $type_limit = array('jpg','jpeg','png');
 
    if(preg_match('/data:\s*image\/(\w+);base64,/iu',$img,$tmp)){
        if(!in_array($tmp[1],$type_limit)){
            echo '{"status":0,"content":"图片格式不正确","url":""}';
        }
    }else{
        error('抱歉！上传失败，请重新再试!');
    }
     
    $img = str_replace(' ','+',$img);
     
    $img = str_replace($tmp[0], '', $img);
 
    $img = base64_decode($img);
    
    $file = $path.time().'.'.$tmp[1];
    if(file_put_contents($file,$img)){
        
        echo '{"status":1,"md5":"'.$md5.'","content":"上传成功","url":""}';
    }else{
        echo '{"status":0,"content":"上传失败"}';
    }
?>
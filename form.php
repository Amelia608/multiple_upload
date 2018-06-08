<?php
//	var_dump($_FILES);
	$str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
	$images=$_FILES;
	$file_tmp_name=$_FILES["file"]["tmp_name"];
	$file_name=$_FILES["file"]["name"];
	$arr=array();
	for($i=0;$i<count($file_name);$i++){
		$randStr = str_shuffle($str);//打乱字符串  
		$rands= substr($randStr,0,6);//substr(string,start,length);返回字符串的一部分
		$rand_name= date("YmdHms").$i.$rands;
		move_uploaded_file($file_tmp_name[$i],"upload/".$rand_name.".jpg");
		$arr[$i]=$rand_name.".jpg";
	}
	$res["code"]="success";
	$res["list"]=$arr;
	echo  json_encode($res,JSON_UNESCAPED_UNICODE);
?>
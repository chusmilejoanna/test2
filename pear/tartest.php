<?php
include('Archive/Tar.php');

$obj=new Archive_Tar('apple.tar');
$files=array('include.php','captcha.php','tadd.php');

if($obj->create($files)){
	echo 'Create Success';
}else{
	echo 'Error';
}


?>
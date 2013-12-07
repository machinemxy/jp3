<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;
$lesson=$_GET['lesson'];
$part=$_GET['part'];


//Get the next word to test
$msql->query("select count(*) from words where lesson=$lesson and part=$part and times<3");
list($count)=mysql_fetch_row($msql->listmysql);
$order=rand(0,$count-1);
$msql->query("select Id,times from words where lesson=$lesson and part=$part and times<3 limit $order,1");
list($Id,$times)=mysql_fetch_row($msql->listmysql);

if($times==0){
	$tool->goURL("test1.php?lesson=$lesson&part=$part&Id=$Id");
}elseif($times==1){
	$tool->goURL("test2.php?lesson=$lesson&part=$part&Id=$Id");
}else{
	$tool->goURL("test3.php?lesson=$lesson&part=$part&Id=$Id");
}
?>
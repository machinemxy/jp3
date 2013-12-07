<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;

$Id=$_POST['Id'];
$lesson=$_POST['lesson'];
$part=$_POST['part'];
$selection=$_POST['selection'];
$co_selection=$_POST['co_selection'];

if($selection==$co_selection){
	$msql->query("update words set times=times+1 where Id=$Id");
	$msql->query("select times from words where Id=$Id");
	list($times)=mysql_fetch_row($msql->listmysql);
	if($times==3){
		$msql->query("update words set masterdate=sysdate() where Id=$Id");
	}
	$tool->goURL("distribution.php?lesson=$lesson&part=$part&sub=a");
}else{
	$tool->goURL("wrong.php?lesson=$lesson&part=$part&Id=$Id");
}
?>
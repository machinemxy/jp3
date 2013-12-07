<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;
$Id=$_GET['Id'];
$lesson=$_GET['lesson'];
$part=$_GET['part'];

//delete
$msql->query("delete from words where Id=$Id");
$tool->goURL("management.php?lesson=$lesson&part=$part");
?>
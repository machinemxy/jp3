<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;
$Id=$_GET['Id'];

//delete
$msql->query("update words set wrongtimes=0 where Id=$Id");
$tool->goURL("mistaken.php");
?>
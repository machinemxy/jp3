<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;

//Get arguments
$Id=$_POST['Id'];
$lesson=$_POST['lesson'];
$part=$_POST['part'];
$kana=$_POST['kana'];
$kanji=$_POST['kanji'];
$meaning=$_POST['meaning'];

//Do modify
$msql->query("update words set kana='$kana',kanji='$kanji',meaning='$meaning' where Id=$Id");
$tool->goURL("management.php?lesson=$lesson&part=$part");
?>
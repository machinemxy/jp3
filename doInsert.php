<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;

//Get arguments
$lesson=$_POST['lesson'];
$part=$_POST['part'];
$kana=$_POST['kana'];
$kanji=$_POST['kanji'];
$meaning=$_POST['meaning'];

//Do insert
$msql->query("insert into words(lesson,part,kana,kanji,meaning) values ('$lesson','$part','$kana','$kanji','$meaning')");
$tool->goURL("management.php?lesson=$lesson&part=$part");
?>
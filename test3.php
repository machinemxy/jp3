<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$Id=$_GET['Id'];
$lesson=$_GET['lesson'];
$part=$_GET['part'];

//Get the correct data
$msql->query("select kana,kanji,meaning from words where Id=$Id and lesson=$lesson and part=$part");
list($kana,$kanji,$meaning)=mysql_fetch_row($msql->listmysql);
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<script language="javascript">
		function load(){
			document.getElementById("fc").focus();
		}
	</script>
	<title>Japanese3</title>
</head>
<body onload="load();">
	<fieldset>
		<legend>Lesson <?php echo $lesson; ?>; Part <?php echo $part; ?></legend>
		<h2><?php echo $kanji."|".$meaning; ?></h2>
		<form name="form1" method="post" action="check.php">
			<input name="selection" id="fc"/>
			<input type="hidden" name="lesson" value="<?php echo $lesson; ?>"/>
			<input type="hidden" name="part" value="<?php echo $part; ?>"/>
			<input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
			<input type="hidden" name="co_selection" value="<?php echo $kana; ?>"/>
			<input type="submit"/>
		</form>
	</fieldset>
	<a href="index.php">Back</a>
</body>
</html>
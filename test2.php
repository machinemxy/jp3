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
$selections[0]=$kana;

//Get the incorrect data
$msql->query("select kana from words where Id!=$Id and lesson=$lesson and part=$part order by rand() limit 0,3");
$i=1;
while(list($in_kana)=mysql_fetch_row($msql->listmysql)){
	$selections[$i]=$in_kana;
	$i=$i+1;
}
shuffle($selections);
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
	<script language="javascript">
		function load(){
			document.getElementById("fc").focus();
		}

		document.onkeydown=function(){
			key=window.event.keyCode;
			if (key>=49 && key<=52)
			{
				document.getElementById('sub_'+(key-49)).click();
			}
		}
	</script>
</head>
<body onload="load();">
	<fieldset>
		<legend>Lesson <?php echo $lesson; ?>; Part <?php echo $part; ?></legend>
		<h2><?php echo $kanji."|".$meaning; ?></h2>
		<form name="form1" method="post" action="check.php">
			<?php 
			for($i=0;$i<=3;$i++){ 
			echo $i+1;
			?>
			.
			<input name="selection" type="submit" id="sub_<?php echo $i; ?>"i
			value="<?php echo $selections[$i]; ?>">
			<br/>
			<?php } ?>
			<input type="hidden" name="lesson" value="<?php echo $lesson; ?>"/>
			<input type="hidden" name="part" value="<?php echo $part; ?>"/>
			<input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
			<input type="hidden" name="co_selection" value="<?php echo $kana; ?>"/>
		</form>
	</fieldset>
	<a href="index.php" id="fc">Back</a>
</body>
</html>
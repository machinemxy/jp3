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
$selections[0]=$kanji."|".$meaning;

//Get the incorrect data
$msql->query("select kanji,meaning from words where Id!=$Id and lesson=$lesson and part=$part order by rand() limit 0,3");
$i=1;
while(list($in_kanji,$in_meaning)=mysql_fetch_row($msql->listmysql)){
	$selections[$i]=$in_kanji."|".$in_meaning;
	$i=$i+1;
}
shuffle($selections);
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
</head>
<body>
	<fieldset>
		<legend>Lesson <?php echo $lesson; ?>; Part <?php echo $part; ?></legend>
		<h2><?php echo $kana; ?></h2>
		<form name="form1" method="post" action="check.php">
			<?php for($i=0;$i<=3;$i++){ ?>
			<input name="selection" type="submit" value="<?php echo $selections[$i]; ?>">
			<br/>
			<?php } ?>
			<input type="hidden" name="lesson" value="<?php echo $lesson; ?>"/>
			<input type="hidden" name="part" value="<?php echo $part; ?>"/>
			<input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
			<input type="hidden" name="co_selection" value="<?php echo $kanji."|".$meaning; ?>"/>
		</form>
	</fieldset>
	<a href="index.php">Back</a>
</body>
</html>
<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$Id=$_GET['Id'];
$lesson=$_GET['lesson'];
$part=$_GET['part'];

//Get the origin data
$msql->query("select kana,kanji,meaning from words where Id=$Id");
list($kana,$kanji,$meaning)=mysql_fetch_row($msql->listmysql);
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
	<script language="javascript">
		function load(){
			document.getElementById("fc").focus();
		}
	</script>
</head>
<body onload="load();">
	<fieldset>
		<legend>Lesson <?php echo $lesson; ?>; Part <?php echo $part; ?></legend>
		<form name="form1" method="post" action="doModify.php">
			<table>
				<tr>
					<td>Kana</td><td><input name="kana" id="fc" value="<?php echo $kana; ?>"/></td>
				</tr>
				<tr>
					<td>Kanji</td><td><input name="kanji" value="<?php echo $kanji; ?>"/></td>
				</tr>
				<tr>
					<td>Meaning</td><td><input name="meaning" value="<?php echo $meaning; ?>"/></td>
				</tr>
			</table>
			<input type="hidden" name="Id" value="<?php echo $Id; ?>"/>
			<input type="hidden" name="lesson" value="<?php echo $lesson; ?>"/>
			<input type="hidden" name="part" value="<?php echo $part; ?>"/>
			<input type="submit"/><a href="management.php?lesson=<?php echo $lesson; ?>&part=<?php echo $part; ?>">Back</a>
		</form>
	</fieldset>
</body>
</html>
<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$Id=$_GET['Id'];
$lesson=$_GET['lesson'];
$part=$_GET['part'];

$msql->query("update words set times=0,wrongtimes=wrongtimes+1 where Id=$Id");
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
	<h2 style="color:red;">Wrong!</h2>
	<table border="1,black,dashed" cellpadding="0" cellspacing="0">
		<tr>
			<td>Kana</td><td><?php echo $kana; ?></td>
		</tr>
		<tr>
			<td>Kanji</td><td><?php echo $kanji; ?></td>
		</tr>
		<tr>
			<td>Meaning</td><td><?php echo $meaning; ?></td>
		</tr>
	</table>
	<a href="distribution.php?lesson=<?php echo $lesson; ?>&part=<?php echo $part; ?>&&sub=a" id="fc">Back</a>
</body>
</html>
<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$lesson=$_GET['lesson'];
$part=$_GET['part'];
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
		<table border="1,black,dashed" cellpadding="0" cellspacing="0">
			<tr>
				<th>Kana</th>
				<th>Kanji</th>
				<th>Meaning</th>
				<th>Degree</th>
				<th>Master Date</th>
				<th>Wrong</th>
			</tr>
			<?php
			$msql->query("select Id,kana,kanji,meaning,times,masterdate,wrongtimes from words where lesson=$lesson and part=$part and wrongtimes>0 order by Id");
			while(list($Id,$kana,$kanji,$meaning,$times,$masterdate,$wrongtimes)=mysql_fetch_row($msql->listmysql)){
			?>
			<tr>
				<td><?php echo $kana; ?></td>
				<td><?php echo $kanji; ?></td>
				<td><?php echo $meaning; ?></td>
				<td>
				<?php 
				if($times==0){
					echo "---";
				}elseif($times==1){
					echo "+--";
				}elseif($times==2){
					echo "++-";
				}else{
					echo "+++";
				}
				?>
				</td>
				<td><?php echo $masterdate ?></td>
				<td align="center"><?php echo $wrongtimes ?></td>
			</tr>
			<?php
			}
			?>
		</table>
		<a href="index.php" id="fc">Back</a>
	</fieldset>
</body>
</html>